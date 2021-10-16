@extends('layouts.app')

@section('title', 'パスワード再発行')

@section('content')
  {{-- ヘッダー --}}
  @include('header')
  {{-- メインコンテンツ --}}
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container l-content">
        <div class="c-box c-box--m c-box--border">
          <form class="c-form" action="{{ route('password.update') }}" method="post">
            @csrf
						<input type="hidden" name="token" value="{{ $token }}">
            <h1 class="c-form__ttl">パスワード再設定</h1>
            <p class="c-form__lead">
							新しいパスワードを入力してください。
            </p>
            {{-- エラーリスト --}}
						@include('error_card_list')
						{{-- パウワード再発行用メッセージ --}}
						@if (session('status'))
              <div class="c-form__status__message" role="alert">
                  {{ session('status') }}
              </div>
            @endif
						
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">メールアドレス</div>
                <input type="email" name="email" value="{{ old('email') }}" class="c-form__input">
              </label>
            </div>
						
						<div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">新しいパスワード</div>
                <input type="password" name="password" class="c-form__input">
              </label>
            </div>
						
						<div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">新しいパスワード（再入力）</div>
                <input type="password" name="password_confirmation" class="c-form__input">
              </label>
            </div>
            
            <div class="p-login">
              <button type="submit" class="c-btn c-btn--primary">送信する</button>
              
              <div class="p-login__link">
                <a href="{{ route('password.request') }}" class="p-login__link__forget">メース送信ページへ戻る</a>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
  {{-- フッター --}}
  @include('footer')
@endsection