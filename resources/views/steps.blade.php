@extends('layouts.app')

@section('title', '記事一覧')

@section('content')
  {{-- ヘッダー --}}
  @include('header')
  {{-- メインコンテンツ --}}
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container--m l-content">
        {{-- 検索エリア --}}
        <div class="c-box c-box--border">
        	<form class="c-search" action="" method="get">
            <div class="c-search__head">
              <h1 class="c-search__heading">Search<span class="c-search__heading--s">投稿を探す</span></h1>
            </div>
            <div class="c-search__body">
              <i class="fas fa-search c-search--icon"></i>
              <input type="text" name="keyword" value="{{ $keyword }}" class="c-search__input" placeholder="キーワードで検索">
              
              <p class="c-search__txt">ジャンル別で探す</p>
              <select class="c-search__select" name="category_id">
                <option value="0">選択してください</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" @if($category->id == $category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
              </select>
              <button type="submit" class="c-btn c-btn--primary">検索する</button>
            </div>
          </form>
        </div>
        {{-- 記事一覧 --}}
        <div class="p-project">
          <h1 class="p-project__ttl">投稿一覧</h1>
          
          <section class="c-card__group">
            @foreach($steps as $step)
              <a href="{{ route('steps.show', ['step' => $step]) }}" class="c-card p-project__box p-project__box--border">
                <h1 class="c-card__heading">{{ Str::limit($step->title, 20, '...') }}</h1>
                <p class="c-card__txt">{{ Str::limit($step->comment, 40, '...') }}</p>
                <span class="c-card__tag">{{ $step->category->name }}</span><span class="c-card__time">{{ $step->created_at->format('Y/m/d') }}</span>
              </a>
            @endforeach
            @if($steps->isEmpty())
              <p class="c-box c-box--border">お探しの記事は見つかりませんでした。</p>
            @endif
          </section>
          {{-- ページング --}}
          {{ $steps->appends(request()->input())->links('vendor.pagination.original-pagination') }}
        </div>
        
      </section>
    </div>
  </div>
  {{-- フッター --}}
  @include('footer')
@endsection