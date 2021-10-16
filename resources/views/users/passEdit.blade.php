@extends('layouts.app')

@section('title', 'パスワード変更')

@section('content')
  @include('header')
  
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container l-content">
        <div class="c-box c-box--m c-box--border">
          @include('error_card_list')
          <form class="c-form" action="{{ route('passEdit') }}" method="post">
            @csrf
            <h1 class="c-form__ttl">パスワード変更</h1>
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">現在のパスワード</div>
                <input type="text" name="pass_old" value="{{ old('pass_old') }}" class="c-form__input">
              </label>
            </div>
            
            <div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">新しいパスワード<small class="c-form--anounce">※8文字以上、半角英数字</small></div>
                <input type="password" name="pass_new" class="c-form__input">
              </label>
            </div>
            
						<div class="c-form__list">
              <label class="c-form__head">
                <div class="c-form__head__txt">新しいパスワード（再入力）</div>
                <input type="password" name="pass_new_confirmation" class="c-form__input">
              </label>
            </div>
            
            <button type="submit" class="c-btn c-btn--primary">変更する</button>
						
          </form>
        </div>
      </section>
    </div>
  </div>
  
  @include('footer')
@endsection
