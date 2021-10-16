@extends('layouts.app')

@section('title', '投稿記事一覧')

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
				{{-- メッセージ一覧 --}}
				<div class="c-card p-mypage">
					<div class="c-card__head">
						<h2 class="c-card__heading">
							コメントした記事一覧
						</h2>
					</div>
					<ul class="c-card__list p-mypage__list">
						@foreach($boards as $board)
							<li class="c-card__item p-mypage__item">
								<a class="p-mypage__card--link" href="{{ route('steps.show', ['step' => $board->step]) }}">
									<h3 class="p-mypage__heading">{{ Str::limit($board->step->title, 50, '...') }}</h3>
									<p class="p-mypage__message__txt">{{ Str::limit($board->message->msg, 150, '...')  }}</p>
								</a>
							</li>
						@endforeach
						@if($boards->isEmpty())
							<li class="c-card__item p-mypage__item p-mypage__item--flex">
								まだコメントをしていません。
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