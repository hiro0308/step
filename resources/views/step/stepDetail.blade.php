@extends('layouts.app')

@section('title', '投稿詳細')

@section('content')
	@include('header')
	
	<div class="l-main">
		<div class="u-bgColor--baseColor">
			
			<section class="l-container l-container--m l-content">
				<div class="c-card c-box c-box--border p-stepOne">
					<h2 class="p-stepOne__heading">
						{{ $step->title }}
					</h2>
					<span class="c-card__tag p-stepOne__tag">
						{{ $step->category->name }}
					</span>
					<h3 class="p-stepOne__subHeading">体験内容</h3>
					<p class="p-stepOne__txt">
						{{ $step->comment }}
					</p>
					<div class="p-user">
						<a class="c-box p-user__show p-user--border" href="{{ route('user', ['user' => $postUser]) }}">
							<div class="p-user__imgContainer">
								<img src="{{ asset('storage/images/' . $postUser->pic) }}" class="p-user__img">
							</div>
							<div class="p-user__prof">
								<h3 class="p-user__intro">この記事の投稿者</h3>
								<p class="p-user__name">{{ $postUser->username }}</p>
							</div>
						</a>
					</div>
					<div class="p-stepOne__foot">
						<article-like
						 :initial-is-liked-by='@json($step->isLikedBy(Auth::user()))'
						 :authorized='@json(Auth::check())'
						 endpoint="{{ route('steps.like', ['step' => $step]) }}"
						>
						</article-like>
			
					</div>
					
				</div>
				
				<div class="c-box c-box--border p-board">
					@foreach($msgs as $msg)
						@if(Auth::id() === $msg->user_id)
							<div class="p-board__right p-board--flex">
								<div class="p-board__txt">
									{{ $msg->msg }}
								</div>
								<div class="p-board__avatar">
									<img src="{{ asset('storage/images/' . $msg->user->pic) }}" class="p-board__img">
								</div>
							</div>
						@else
							<div class="p-board__left p-board--flex">
								<div class="p-board__avatar">
									<img src="{{ asset('storage/images/' . $msg->user->pic) }}" class="p-board__img">
								</div>
								<div class="p-board__txt">
									{{ $msg->msg }}
								</div>
							</div>
						@endif
					@endforeach
					
						
					<div class="p-board__form">
						<form class="p-board__form" action="{{ route('messages', ['board' => $board->id]) }}" method="post">
							@csrf
							<textarea name="comment" class="p-board__textarea" placeholder="メッセージを入力しください" required></textarea>
							@if ($errors->any())
								<small class="p-board__error">{{ $errors->first() }}</small>
							@endif
							
							<button type="submit" class="c-btn c-btn--primary p-board__submit">メッセージを送信する</button>
						</form>
					</div>
				</div>
				
			</section>
		</div>
	</div>
	
	@include('footer')
@endsection