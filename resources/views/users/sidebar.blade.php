<div class="l-side">
	<h2 class="c-side__heading">メニュー</h2>
	<div class="c-side__mypage">
		<ul class="c-side__mypage__list">
			<li class="c-side__mypage__item"><a href="{{ route('steps.create') }}" class="c-side__mypage__link">投稿する</a></li>
			<li class="c-side__mypage__item"><a href="{{ route('mypage.steps') }}" class="c-side__mypage__link">投稿記事一覧</a></li>
			<li class="c-side__mypage__item"><a href="{{ route('mypage.likes') }}" class="c-side__mypage__link">お気に入り記事一覧</a></li>
			<li class="c-side__mypage__item"><a href="{{ route('mypage.messages') }}" class="c-side__mypage__link">コメント投稿記事一覧</a></li>
		</ul>
	</div>
	
	<h2 class="c-side__heading">設定</h2>
	<div class="c-side__mypage">
		<ul class="c-side__mypage__list">
			<li class="c-side__mypage__item"><a href="{{ route('profEdit') }}" class="c-side__mypage__link">プロフィール編集</a></li>
			<li class="c-side__mypage__item"><a href="{{ route('passEdit') }}" class="c-side__mypage__link">パスワード変更</a></li>
			<li class="c-side__mypage__item"><a href="{{ route('leave') }}" class="c-side__mypage__link">退会</a></li>
		</ul>
	</div>
</div>