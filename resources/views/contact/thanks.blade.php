@extends('layouts.app')

@section('content')
	{{-- ヘッダー --}}
	@include('header')
	{{-- メインコンテンツ --}}
	<div class="l-main">
		<div class="u-bgColor--baseColor">
			<section class="l-container l-content">
				<div class="c-box p-thanks">
					<h1>お問い合わせありがとうございます。</h1>
					<p>確認のため、お客様に自動送信メールをお送りしております。</p>
					<a href="{{ route('mypage') }}" class="p-thanks__link">トップページへ戻る</a>
				</div>
			</section>
		</div>
	</div>
		{{-- フッター --}}
	@include('footer')
@endsection