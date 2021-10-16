<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactSendMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
		{
			return view('contact.contact');
		}
		
		public function confirm(ContactRequest $request)
		{
			$inputs = $request->all();
			
			return view('contact.confirm', compact('inputs'));
		}
		
		public function send(ContactRequest $request)
		{
			$action = $request->action;
			//actionを除外
			$inputs = $request->except('action');
			//入力内容を修正する場合
			if($action !== 'submit') {
				Log::debug('contactページへ遷移します');
				return redirect()->route('contact.index')->withInput();
			}else {//メールを送信する場合
				Log::debug('thanksページへ遷移します。');
				//メール送信
				\Mail::to($inputs['email'])->send(new ContactSendMail($inputs));
				//再送信防止のためにトークンを再発行
				$request->session()->regenerateToken();
				//送信完了用ページ表示
				return view('contact.thanks');
			}
		}
		
}
