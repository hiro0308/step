@extends('layouts.app')

@section('title', 'お気に入り記事一覧')

@section('content')
	{{-- ヘッダー --}}
	@include('header')
	<div class="u-bgColor--baseColor">
	<section class="l-container--m l-content">
		<div class="l-column">
			{{-- サイドバー --}}
			@include('users.sidebar')
			{{-- メインコンテンツ --}}
			<div class="l-main l-main--2column">
				<div class="c-card p-mypage">
					<div class="c-card__head">
						<h2 class="c-card__heading">
							お気に入り記事一覧
						</h2>
					</div>
					<ul class="c-card__list p-mypage__list">
						@foreach($likes as $like)
							<li class="c-card__item p-mypage__item">
								<a class="p-mypage__card--link" href="{{ route('steps.show', ['step' => $like]) }}">
									<h3 class="p-mypage__heading">{{ Str::limit($like->title, 50, '...') }}</h3>
									<div class="p-mypage__txt">{{ Str::limit($like->comment, 100, '...') }}</div>
									<span class="c-card__tag">{{ $like->category->name }}</span>
								</a>
							</li>
						@endforeach
						@if($likes->isEmpty())
							<li class="c-card__item p-mypage__item p-mypage__item--flex">
								まだ記事を投稿していません。
							</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</section>
</div>
	{{-- フッター --}}
	@include('footer')
@endsection