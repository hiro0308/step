@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
	{{-- ヘッダー --}}
	@include('header')
	<div class="u-bgColor--baseColor">
	<section class="l-container--m l-content">
		<div class="l-column">
			{{-- サイドバー --}}
			@include('users.sidebar')
			{{-- メインコンテンツ(2カラム) --}}
			<div class="l-main l-main--2column">
				<div class="c-box c-box--m c-box--border">
					{{-- エラーリスト --}}
					@include('error_card_list')
					
          <form class="c-form" action="{{ route('profEdit') }}" method="post" enctype="multipart/form-data">
						@csrf
						
						<div class="c-form__list">
							<div class="c-form__circle">
								<img src="{{ asset('storage/images/' . $user->pic) }}" class="c-form__circle--img js-prev">
							</div>
							
							<div class="c-btn c-btn--upload">
								画像をアップロード
								<input type="file" name="pic" accept="" class="c-form__file js-prev-target">
							</div>
						</div>
						
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">メールアドレス<span class="c-form__label">必須</span></div>
                <input type="email" name="email" value="{{ old('email') ?? $user->email ?? '' }}" class="c-form__input">
              </label>
            </div>
						
						<div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">ユーザー名</div>
                <input type="text" name="username" value="{{ old('username') ?? $user->username ?? '' }}" class="c-form__input">
              </label>
            </div>
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">自己紹介</div>
                <textarea name="comment" class="c-form__textarea">{{ old('comment') ?? $user->comment ?? '' }}</textarea>
								
              </label>
            </div>
            
            <button type="submit" class="c-btn c-btn--primary">変更する</button>

            </div>
          </form>
        </div>
			</section>
		</div>
	</div>
	{{-- フッター --}}
	@include('footer')
@endsection

















