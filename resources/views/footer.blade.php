<div class="l-footer">
	<div class="l-container--m">
		<div class="c-footer">
			<nav class="c-footer__nav">
				<h2 class="c-footer__nav__heading">サービスメニュー</h2>
				<ul class="c-footer__nav__list">
					<li class="c-footer__nav__item"><a href="@auth {{ route('mypage') }} @endauth @guest {{ route('home') }} @endguest" class="c-footer__nav__link">トップページ</a></li>
					<li class="c-footer__nav__item"><a href="{{ route('steps.index') }}" class="c-footer__nav__link">成功体験を探す</a></li>
					<li class="c-footer__nav__item"><a href="{{ route('contact.index') }}" class="c-footer__nav__link">お問い合わせ</a></li>
					@guest
						<li class="c-footer__nav__item"><a href="{{ route('login') }}" class="c-footer__nav__link">ログイン</a></li>
						<li class="c-footer__nav__item"><a href="{{ route('register') }}" class="c-footer__nav__link">会員登録（無料）</a></li>
					@endguest
					
					@auth
						<li class="c-footer__nav__item"><a href="{{ route('mypage') }}" class="c-footer__nav__link">マイページへ</a></li>
						<li class="c-footer__nav__item">
							<form class="" action="{{ route('logout') }}" method="post">
								@csrf
								<button type="submit" name="logout" class="c-footer__nav__link c-footer__logout__btn">ログアウト</button>
							</form>
						</li>
					@endauth
				</ul>
			</nav>
			
			<nav class="c-footer__nav">
				<h2 class="c-footer__nav__heading">会社情報</h2>
				<ul class="c-footer__nav__list">
					<li class="c-footer__nav__item"><a href="{{ route('rule') }}" class="c-footer__nav__link">利用規約</a></li>
					<li class="c-footer__nav__item"><a href="privacy" class="c-footer__nav__link">プライバシーポリシー</a></li>
				</ul>
			</nav>
			
			<small class="c-footer__copy">©︎ 2021 step</small>
		</div>
	</div>
</div>