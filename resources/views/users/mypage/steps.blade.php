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
				<div class="c-card p-mypage">
					<div class="c-card__head">
						<h2 class="c-card__heading">
							投稿済み記事一覧
						</h2>
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
									<form action="{{ route('steps.destroy', ['step' => $step]) }}" method="post">
										@csrf
										@method('delete')
										<button type="submit" class="p-mypage__project__delete">削除</button>
									</form>
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
			</div>
		</div>
	</section>
</div>
	{{-- フッター --}}
	@include('footer')
@endsection