@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
  {{-- ヘッダー --}}
  @include('header')
  {{-- メインコンテンツ --}}
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container l-content">
        <div class="c-box c-box--m c-box--border">
          <form class="c-form" action="" method="post">
            @csrf
            <h1 class="c-form__ttl">ログイン</h1>
            {{-- エラーリスト --}}
            @include('error_card_list')
            
            <div class="p-login">
              <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="c-btn c-btn--secondary c-btn--googleIcon">GOOGLEでログイン</a>
            </div>
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">メールアドレス</div>
                <input type="email" name="email" value="{{ old('email') }}" class="c-form__input">
              </label>
            </div>
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">パスワード<small class="c-form--anounce">※8文字以上、半角英数字</small></div>
                <input type="password" name="password" value="" class="c-form__input">
              </label>
            </div>
            
            <div class="c-form__list">
              <label class="c-form__head">
                <input type="checkbox" name="remember" class="c-form__checkbox">次回ログインを省略する
              </label>
            </div>
            
            <div class="p-login">
              <button type="submit" class="c-btn c-btn--primary">ログイン</button>
              
              <div class="p-login__link">
                <a href="{{ route('password.request') }}" class="p-login__link__forget">パスワードをお忘れですか?</a>
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
