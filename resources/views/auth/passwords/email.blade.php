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
          <form class="c-form" action="{{ route('password.email') }}" method="post">
            @csrf
            <h1 class="c-form__ttl">パスワードを忘れた方</h1>
            <p class="c-form__lead">ご登録済のメールアドレスを入力してください。<br>
              メールアドレス宛にパスワード再設定のメールをお送りします。
            </p>
            {{-- エラーリスト --}}
            @include('error_card_list')
            {{-- パウワード再発行用メッセージ --}}
            @if (session('status'))
              <div class="c-form__status__message">
                  {{ session('status') }}
              </div>
            @endif
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">メールアドレス</div>
                <input type="email" name="email" value="{{ old('email') }}" class="c-form__input">
              </label>
            </div>
            
            <div class="p-login">
              <button type="submit" class="c-btn c-btn--primary">送信する</button>
              
              <div class="p-login__link">
                <a href="{{ route('login') }}" class="p-login__link__forget">ログインページへ戻る</a>
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
