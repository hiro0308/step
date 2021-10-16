@extends('layouts/app')

@section('title', 'トップページ')

@section('content')
	{{-- ヘッダー --}}
	@include('header')
	{{-- メインコンテンツ --}}
	<div class="l-main">
		{{-- 背景色・背景画像 --}}
		<div class="u-bgColor--baseColor u-bgImage--topImage">
			
				<section class="p-top__outline">
					<div class="l-container">
						<h1 class="p-top__outline__heading">
							ほんの少しのキッカケが<br class="p-top__outline--line">できる<br>
							<span class="p-top__outline__space">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>成功体験投稿サービス
						</h1>
						<p class="p-top__outline__txt">stepで人生の転機を迎えよう！</p>
						<a href="{{ route('register') }}" class="p-top__outline__link">会員登録（無料）</a>
				</div>
				</section>
				
				<section class="p-top__features">
					<div class="l-container">
						<h2 class="p-top__heading"><span class="p-top__heading__en">Features</span>stepの特徴</h2>
						<div class="p-top__features__container">
							<article class="p-top__features__block">
								<div class="p-top__features__imgContainer">
									<img src="{{ asset('storage/project/features01.png') }}" class="p-top__features__img">
								</div>
								<p class="p-top__features__txt">かんたんに記事の投稿・お気に入り登録ができ、お探しのスキルにマッチした記事を見つけることができます。</p>
							</article>
							<article class="p-top__features__block">
								<div class="p-top__features__imgContainer">
									<img src="{{ asset('storage/project/features02.png') }}" class="p-top__features__img">
								</div>
								<p class="p-top__features__txt">チャット機能付きなので、先輩にアドバイスをもらうことができます。</p>
							</article>
							<article class="p-top__features__block">
								<div class="p-top__features__imgContainer">
									<img src="{{ asset('storage/project/features03.png') }}" class="p-top__features__img">
								</div>
								<p class="p-top__features__txt">24時間いつでも、お問い合わせいただけますのでお気軽にご相談可能です。</p>
							</article>
						</div>
					</div>
				</section>
				
				<section class="p-top__new">
					<div class="l-container">
						<h2 class="p-top__heading"><span class="p-top__heading__en">New</span>新着記事</h2>
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
						<a href="{{ route('steps.index') }}" class="c-btn c-btn--primary p-top__steps">記事一覧を見る</a>
					</div>
				</section>
				
				<section class="p-top__regist">
					<p class="p-top__regist__txt">\簡単60秒！今すぐ会員登録/</p>
					<a href="{{ route('register') }}" class="p-top__regist__btn">会員登録（無料）</a>
				</section>
			
		</div>
	</div>
	{{-- フッター --}}
	@include('footer')
@endsection