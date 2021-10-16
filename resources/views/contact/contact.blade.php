@extends('layouts.app')

@section('title', 'お問い合わせ')

@section('content')
  {{-- ヘッダー --}}
  @include('header')
  {{-- メインコンテンツ --}}
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container l-content">
        <div class="c-box c-box--m c-box--border">
          <form class="c-form" action="{{ route('contact.confirm') }}" method="post">
            @csrf
            <h1 class="c-form__ttl">お問い合わせ</h1>
            {{-- エラーリスト --}}
            @include('error_card_list')
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">メールアドレス<span class="c-form__label">必須</span></div>
                <input type="email" name="email" value="{{ old('email') ?? $inputs->email ?? '' }}" class="c-form__input">
              </label>
            </div>
						
						<div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">お名前<span class="c-form__label">必須</span></div>
                <input type="text" name="name" value="{{ old('name') ?? $inputs->name ?? '' }}" class="c-form__input">
              </label>
            </div>
						
						<div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">件名<span class="c-form__label">必須</span></div>
                <input type="text" name="subject" value="{{ old('subject') ?? $inputs->subject ?? '' }}" class="c-form__input">
              </label>
            </div>
						
						<div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">お問い合わせ内容<span class="c-form__label">必須</span></div>
                <textarea name="comment" class="c-form__textarea">{{ old('comment') ?? $inputs->comment ?? '' }}</textarea>
              </label>
            </div>
            
            <button type="submit" class="c-btn c-btn--primary">確認ページへ</button>

          </form>
        </div>
      </section>
    </div>
  </div>
  {{-- フッター --}}
  @include('footer')
@endsection
