<?php

namespace App\Http\Controllers;

use App\Http\Requests\profEditRequest;
use App\Http\Requests\EditPassRequest;
use App\Http\Requests\MessageRequest;
use App\Board;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\User;
use App\Step;
use App\Message;

class UserController extends Controller
{
  //マイページ
  public function getMypage()
  {
    //記事情報を最大3つ取得
    $steps = Step::where('user_id', Auth::id())
      ->with('category')
      ->orderBy('created_at', 'desc')
      ->paginate(3);
      
    //お気に入り情報を最大3つ取得
    $likes = Auth::user()->likes()
      ->with('category')
      ->orderBy('created_at', 'desc')
      ->paginate(3);
    
    //コメントのある掲示板を取得
    $boards = Auth::user()->boards
      ->unique('id')
      ->fresh(['step', 'message'])
      ->sortByDesc('message.created_at')
      ->take(3);
    
    return view('users.mypage.mypage', ['steps' => $steps, 'likes' => $likes, 'boards' => $boards]);
  }
  //マイページ用記事一覧
  public function steps()
  {
    $steps = Step::where('user_id', Auth::id())
      ->with('category')
      ->orderBy('created_at', 'desc')
      ->get();
      
    return view('users.mypage.steps', compact('steps'));
  }
  
  //マイページ用お気に入り記事一覧
  public function likes()
  {
    $likes = Auth::user()
      ->likes()
      ->with('category')
      ->orderBy('created_at', 'desc')
      ->get();
    
    return view('users.mypage.likes', compact('likes'));
  }
  //マイページ用メッセージ一覧
  public function messages()
  {
    //コメントのある掲示板を取得
    $boards = Auth::user()->boards
      ->unique('id')
      ->fresh(['step', 'message'])
      ->sortByDesc('message.created_at');
    
    return view('users.mypage.messages', ['boards' => $boards]);
  }

  //パスワード編集
  public function getPassEdit()
  {
    return view('users.passEdit');
  }
  
  public function postPassEdit(EditPassRequest $request)
  {
    $user = Auth::user();
    //新しいパスワードを保存
    $user->password = Hash::make($request->pass_new);
    $user->save();
    
    return redirect('/mypage')->with('flash_message', 'パスワードを更新しました');
  }
  //プロフィール編集
  public function getProfEdit()
  {
    //ユーザー情報を取得
    $user = Auth::user();
            
    return view('users.profEdit', compact('user'));
  }
  
  public function postProfEdit(profEditRequest $request)
  {
     Auth::user()->email = $request->email;
     Auth::user()->username = $request->username;
     Auth::user()->comment = $request->comment;
     //postにfileがなく、DBに画像情報があればそれを登録する
     if(empty($request->file('pic') && !empty(Auth::user()->pic))) {
       $path = Auth::user()->pic;
     }else {
       $path = $request->file('pic')->store('public/images');
     }
     // dd($path);
     Auth::user()->pic = basename($path);
     
     // Auth::user()->pic = $request->file('pic')->storeAs('public', Auth::id().date("YmdHis").'.jpg');
     Auth::user()->save();
     
     return redirect('/mypage')->with('flash_message', 'プロフィールを更新しました。');
  }
  //退会処理
  public function getLeave()
  {
    return view('users.leave');
  }
  
  public function postLeave()
  {
    //ユーザーに紐ずく記事情報を削除
    Auth::user()->steps()->delete();
    //ユーザーに紐ずくコメント情報を削除
    Auth::user()->messages()->delete();
    //ユーザーアカウントを倫理削除
    Auth::user()->delete();
    
    return redirect('/')->with('flash_message', 'ご利用ありがとうございました');
  }
  //掲示板メッセージ投稿
  public function postMessage(Board $board, Message $message, MessageRequest $request)
  {
    $message->board_id = $board->id;
    $message->user_id = $request->user()->id;
    $message->msg = $request->comment;
    $message->save();
    
    return redirect()->route('steps.show', ['step' => $board->article_id]);
  }
  //ユーザー情報
  public function user(User $user)
  {
    //ユーザーの投稿記事を取得
    $steps = $user->steps->sortByDesc('created_at');
    
    return view('users.user', ['steps' => $steps, 'user' => $user]);
  }
}
