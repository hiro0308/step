<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Step;
use App\Board;
use App\User;
use Illuminate\Support\Facades\Log;

class StepController extends Controller
{
    public function __construct()
    {
      $this->authorizeResource(Step::class, 'step');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Step $step)
    {
      //パラメータを取得
      $keyword = '';
      $category_id = '';
      //POSTデータを変数へ格納
      $keyword = $request->keyword;
      $category_id = $request->category_id;
      //クエリ文作成
      $query = Step::query()->with('category');
      
      //キーワード検索
      if(!empty($keyword) && empty($category_id)) {
        Log::debug('キーワードあり');
        $query->whereHas('category', function($q) use ($keyword) {
          $q->where('name', 'LIKE', "%$keyword%");
        })->orWhere('title', 'LIKE', "%$keyword%")
          ->orWhere('comment', 'LIKE', "%$keyword%");
        }

      //ジャンル検索
      if(!empty($category_id) && empty($keyword)) {
        Log::debug('カテゴリーidあり');
        $query->whereHas('category', function($q) use ($category_id) {
          $q->where('id', $category_id);
        });
      }
      //キーワード&&ジャンル検索
      if(!empty($category_id) && !empty($keyword)) {
        $query->whereHas('category', function($q) use ($category_id) {
            $q->where('id', $category_id);
          })->where(function($q) use($keyword) {
            $q->whereHas('category', function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%$keyword%");
              })->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('comment', 'LIKE', "%$keyword%");
          });
      }
      
      $steps = $query->orderBy('created_at', 'desc')->paginate(5);
      
      //カテゴリー情報を取得
      $categories = Category::all();
      
      return view('steps', ['steps' => $steps, 'categories' => $categories, 'keyword' => $keyword, 'category_id' => $category_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // カテゴリー情報を全て取得
      $categories = Category::all();
      return view('step.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepRequest $request, Step $step, Board $board)
    {
        // Log::debug('$request'.$request);
        //記事
        $step->title = $request->title;
        $step->category_id = $request->category;
        $step->comment = $request->comment;
        $step->user_id = $request->user()->id;
        $step->save();
        
        //掲示板
        $board->article_id = $step->id;
        $board->save();
        
        return redirect('/mypage')->with('flash_message', '投稿が完了しました');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Step $step, User $user)
    {
      //投稿記事のユーザー情報を取得
      $postUser = $step->user;
      
      //メッセージ情報を取得
      $msgs = $step->msgs->fresh('user');
      
      //掲示板情報を取得
      $board = $step->board;
      
      return view('step.stepDetail', ['step' => $step, 'msgs' => $msgs, 'board' => $board, 'postUser' => $postUser,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Step $step)
    {
        // 全カテゴリー情報を取得
        $categories = Category::all();
      
        return view('step.edit', ['step' => $step, 'categories' => $categories,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StepRequest $request, Step $step)
    {
      $step->title = $request->title;
      $step->category_id = $request->category;
      $step->comment = $request->comment;
      $step->save();
      return redirect('/mypage')->with('flash_message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $step)
    {
        $step->delete();
        return redirect('mypage')->with('flash_message', '削除しました');
    }
    
    public function like(Request $request, Step $step)
    {
      $step->likes()->detach($request->user()->id);
      $step->likes()->attach($request->user()->id);
      
      return [
        'id' => $step->id,
      ];
    }
    
    public function unlike(Request $request, Step $step)
    {
      $step->likes()->detach($request->user()->id);
      
      return [
        'id' => $step->id,
      ];
    }
}
