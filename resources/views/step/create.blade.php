@extends('layouts.app')

@section('title', '記事投稿')

@section('content')
	{{-- ヘッダー --}}
	@include('header')
	{{-- メインコンテンツ --}}
	<div class="l-main">
		<div class="u-bgColor--baseColor">
			<section class="l-container--m l-content">
				<form class="c-form" action="{{ route('steps.store') }}" method="post">
					@csrf
					<div class="c-box c-box--m c-box--border p-stepPost">
						<div class="c-form__list">
							<h2 class="c-form__heading">Stepの概要</h2>
							
							@include('error_card_list')
							
							<label class="c-form__head">
								<div class="c-form__head__txt">タイトル<span class="c-form__label">必須</span></div>
								<input type="text" name="title" value="{{ old('title') }}" class="c-form__input" placeholder="英検3級に合格する方法">
							</label>
						</div>

						<div class="c-form__list">
							<label class="c-form__head">
								<div class="c-form__head__txt">カテゴリー<span class="c-form__label">必須</span></div>
								<select class="c-form__selectBox" name="category" class="@error('category') u-isValid @enderror">
									<option value="0">選択してください</option>
									@foreach ($categories as $category)
											<option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->name }}</option>
									@endforeach
								</select>
							</label>
						</div>

						<div class="c-form__list">
							<label class="c-form__head">
								<div class="c-form__head__txt">できること<span class="c-form__label">必須</span></div>
								<textarea name="comment" class="c-form__textarea" placeholder="英語嫌いの私が2ヶ月で英検3級に合格した方法を教えます。英語はむやにやたらに問題を解いても上達はしません。ここでは5つのセクションに分けて合格を目指してください。">{{ old('comment') ?? $step->comment ?? '' }}</textarea>
							</label>
						</div>
        	</div>
			
				<button type="submit" class="c-btn c-btn--primary">投稿する</button>
				
				</form>
			</section>
		</div>
	</div>
	{{-- フッター --}}
	@include('footer')
@endsection