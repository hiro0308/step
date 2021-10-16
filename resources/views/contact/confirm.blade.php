@extends('layouts.app')

@section('title', 'お問い合わせ')

@section('content')
  @include('header')
  
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container l-content">
        <div class="c-box c-box--m">
					<h1 class="c-form__ttl">メール確認</h1>
					
					
          <form class="c-form" action="{{ route('contact.send') }}" method="post">
            @csrf
						  
						<input
 							 name="email"
 							 value="{{ $inputs['email'] }}"
 							 type="hidden">

 					 <input
 							 name="name"
 							 value="{{ $inputs['name'] }}"
 							 type="hidden">
 	 
 					 <input
 							 name="subject"
 							 value="{{ $inputs['subject'] }}"
 							 type="hidden">

 					 <input
 							 name="comment"
 							 value="{{ $inputs['comment'] }}"
 							 type="hidden">
							 
					<ul class="p-confirm">
						<li class="p-confirm__list">
							<div class="p-confirm__head">
								メールアドレス
							</div>
							<div class="p-confirm__txt">
								{{ $inputs['email'] }}
							</div>
						</li>
						<li class="p-confirm__list">
							<div class="p-confirm__head">
								お名前
							</div>
							<div class="p-confirm__txt">
								{{ $inputs['name'] }}
							</div>
						</li>
						<li class="p-confirm__list">
							<div class="p-confirm__head">
								件名
							</div>
							<div class="p-confirm__txt">
								{{ $inputs['subject'] }}
							</div>
						</li>
						<li class="p-confirm__list">
							<div class="p-confirm__head">
								お問い合わせ内容
							</div>
							<div class="p-confirm__txt">
								{{ $inputs['comment'] }}
							</div>
						</li>
					</ul>
					<div class="p-confirm__btn">
						<button type="submit" name="action" value="back" class="p-confirm__back">入力内容修正</button>
					  <button type="submit" name="action" value="submit" class="p-confirm__submit">送信する</button>
					</div>
				  

          </form>
        </div>
      </section>
    </div>
  </div>
  
  @include('footer')
@endsection
