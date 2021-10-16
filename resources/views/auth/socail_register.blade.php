@extends('layouts.app')

@section('title', '会員登録')

@section('content')
  {{-- ヘッダー --}}
  @include('header')
  {{-- メインコンテンツ --}}
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container l-content">
        <div class="c-box c-box--m c-box--border">
          <form class="c-form" action="{{ route('register.{provider}', ['provider' => $provider]) }}" method="post">
            @csrf
						<input type="hidden" name="token" value="{{ $token }}">
            <h1 class="c-form__ttl">新規会員登録</h1>
            {{-- エラーリスト --}}
            @include('error_card_list')
						
						<div class="p-login">
              <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="c-btn c-btn--secondary c-btn--googleIcon">GOOGLEでログイン</a>
            </div>
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">メールアドレス</div>
                <input type="email" name="email" value="{{ $email }}" class="c-form__input" disabled>
              </label>
            </div>
            
            <div class="p-login">
              <p class="p-login__txt">新規登録すると、<a href="{{ route('rule') }}" class="p-login__link">利用規約</a>および<a href="{{ route('privacy') }}" class="p-login__link">プライバシーポリシー</a>に同意したとみなされます。</p>
              <button type="submit" class="c-btn c-btn--primary">登録する</button>
              
              <div class="p-login__link">
                <a href="{{ route('login') }}" class="p-login__link__forget">ログインはこちら>></a>
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
