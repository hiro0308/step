@extends('layouts.app')

@section('title', 'マイページ')

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
				{{-- 投稿記事一覧 --}}
				<div class="c-card p-mypage">
					<div class="c-card__head">
						<h2 class="c-card__heading">
							投稿済み記事一覧
						</h2>
						<a href="{{ route('mypage.steps') }}" class="c-card__chart">
							一覧を見る
						</a>
					</div>
					<ul class="c-card__list p-mypage__list">
						@foreach ($steps as $step)
							<li class="c-card__item p-mypage__item p-mypage__item--flex">
								<a class="p-mypage__card" href="{{ route('steps.show', ['step' => $step]) }}">
									<h3 class="p-mypage__heading">{{ Str::limit($step->title, 50, '...') }}</h3>
									<div class="p-mypage__txt">{{ Str::limit($step->comment, 100, '...') }}</div>
									<span class="c-card__tag">{{ $step->category->name }}</span>
								</a>

								<div class="p-mypage__project__btn">
									<a href="{{ route('steps.edit', ['step' => $step]) }}" class="p-mypage__project__edit">編集</a>
									<button type="button" class="p-mypage__project__delete js-modal-open">削除</button>
								</div>
								{{-- モーダルウィンドウ --}}
								<div class="c-modal js-show-open-target">
									<div class="c-modal__bg js-modal-close"></div>
									<div class="c-modal__content">
										<button type="button" class="c-modal__close js-modal-close"></button>
										<div class="p-mypage__modal">
											<form action="{{ route('steps.destroy', ['step' => $step]) }}" method="post">
												@csrf
												@method('delete')
												<p class="p-mypage__modal__lead">{{ $step->title }}を削除しますか？</p>
												<div class="p-mypage__modal__btn">
													<button type="button" class="c-btn c-btn--primary c-btn--primary--s js-modal-close">キャンセル</button>
													<button type="submit" class="c-btn c-btn--delete">削除</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</li>
						@endforeach
						@if($steps->isEmpty())
							<li class="c-card__item p-mypage__item p-mypage__item--flex">
								まだ記事を投稿していません。
							</li>
						@endif
					</ul>
				</div>
				
				{{-- お気に入り記事一覧 --}}
				<div class="c-card p-mypage">
					<div class="c-card__head">
						<h2 class="c-card__heading">
							お気に入り記事一覧
						</h2>
						<a href="{{ route('mypage.likes') }}" class="c-card__chart">
							一覧を見る
						</a>
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
								まだお気に入り登録をしていません。
							</li>
						@endif
					</ul>
				</div>
				
				{{-- メッセージ一覧 --}}
				<div class="c-card p-mypage">
					<div class="c-card__head">
						<h2 class="c-card__heading">
							コメントした記事一覧
						</h2>
						<a href="{{ route('mypage.messages') }}" class="c-card__chart">
							一覧を見る
						</a>
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