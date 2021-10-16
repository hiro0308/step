@extends('layouts.app')

@section('title', '退会')

@section('content')
  {{-- ヘッダー --}}
  @include('header')
  {{-- メインコンテンツ --}}
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container l-content l-content--lg">
        <div class="c-box c-box--m c-box--border">
          <form class="c-form" action="{{ route('leave') }}" method="post">
            @csrf
            <h1 class="c-form__ttl">退会</h1>
            <button type="submit" class="c-btn c-btn--primary">退会する</button>
          </form>
        </div>
      </section>
    </div>
  </div>
  {{-- フッター --}}
  @include('footer')
@endsection
