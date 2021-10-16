{{-- フラッシュメッセージ --}}
@if(session('flash_message'))
	<div class="u-toggleMsg js-show-msg">
		{{ session('flash_message') }}
	</div>
@endif

<div class="l-header">
	<div class="l-header__inner">
		<header class="c-header">
			
			<h1 class="c-header__ttl"><a href="@auth {{ route('mypage') }} @endauth @guest {{ route('home') }} @endguest" class="c-header__ttl__link">STEP</a></h1>
			
			<ul class="c-header__list">
				<li class="c-header__item"><a href="{{ route('steps.index') }}" class="c-header__link">成功体験を探す</a></li>
				<li class="c-header__item"><a href="{{ route('contact.index') }}" class="c-header__link">お問い合わせ</a></li>
			</ul>
			{{-- ナビゲーション --}}
			<nav class="c-nav l-header__nav js-toggle-sp-menu-target">
				<ul class="c-nav__list">
					{{-- 未ログインユーザーの場合 --}}
					@guest
						<li class="c-nav__login__item"><a href="{{ route('login') }}" class="c-nav__login__btn">ログイン</a></li>
						<li class="c-nav__register__item"><a href="{{ route('register') }}" class="c-nav__register__btn">会員登録（無料）</a></li>
					@endguest
					{{-- ログイン済みユーザーの場合 --}}
					@auth
						<li class="c-nav__mypage__item"><a href="{{ route('mypage') }}" class="c-nav__mypage__btn">マイページへ</a></li>
						<li class="c-nav__logout__item">
							<form class="c-nav__form" action="{{ route('logout') }}" method="post">
								@csrf
								<button type="submit" name="logout" class="c-nav__logout__btn">ログアウト</button>
							</form>
						</li>
					@endauth
				</ul>
			</nav>
			
			{{-- sp用メニュー --}}
			<div class="c-humburger js-toggle-sp-menu">
				<span class="c-humburger--line"></span>
				<span class="c-humburger--line"></span>
				<span class="c-humburger--line"></span>
			</div>
			
		</header>
	</div>
</div>