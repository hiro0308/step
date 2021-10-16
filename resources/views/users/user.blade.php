@extends('layouts.app')

@section('title', 'ユーザーページ')

@section('content')
  {{-- ヘッダー --}}
  @include('header')
  {{-- メインコンテンツ --}}
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container--m l-content">
        {{-- ユーザー情報 --}}
        <div class="c-box c-box--border p-user">
        	<div class="p-user__imgContainer--l">
        		<img src="{{ asset('storage/images/'. $user->pic) }}" class="p-user__img">
        	</div>
					<div class="p-user__name p-user__name--center">
						{{ $user->username }}
					</div>
					<div class="p-user__comment">
						{{ $user->comment }}
					</div>
        </div>
        {{-- 投稿記事一覧 --}}
        <div class="p-project">
          <h1 class="p-project__ttl">投稿記事一覧</h1>
          <section class="c-card__group">
            @foreach($steps as $step)
              <a href="{{ route('steps.show', ['step' => $step]) }}" class="c-card p-project__box p-project__box--border">
                <h1 class="c-card__heading">{{ Str::limit($step->title, 20, '...') }}</h1>
                <p class="c-card__txt">{{ Str::limit($step->comment, 40, '...') }}</p>
                <span class="c-card__tag">{{ $step->category->name }}</span><span class="c-card__time">{{ $step->created_at->format('Y/m/d') }}</span>
              </a>
            @endforeach
            @if($steps->isEmpty())
              <p class="c-box c-box--border">まだ投稿記事はありません。</p>
            @endif
          </section>
        </div>
      </section>
    </div>
  </div>
  {{-- フッター --}}
  @include('footer')
@endsection