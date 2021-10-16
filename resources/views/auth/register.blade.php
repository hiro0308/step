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
          <form class="c-form" action="" method="post">
            @csrf
            <h1 class="c-form__ttl">新規会員登録</h1>
            {{-- エラーリスト --}}
            @include('error_card_list')
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">メールアドレス</div>
                <input type="email" name="email" value="{{ old('email') }}" class="c-form__input">
              </label>
            </div>
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">パスワード<small class="c-form--anounce">※8文字以上、半角英数字</small></div>
                <input type="password" name="password" class="c-form__input">
              </label>
            </div>
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">パスワード（再入力）</div>
                <input type="password" name="password_confirmation" class="c-form__input">
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
