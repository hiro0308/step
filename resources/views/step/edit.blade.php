@extends('layouts.app')

@section('title', '記事編集')

@section('content')
	{{-- ヘッダー --}}
	@include('header')
	{{-- メインコンテンツ --}}
	<div class="l-main">
		<div class="u-bgColor--baseColor">
			<section class="l-container--m l-content">
				<div class="c-box c-box--m c-box--border">
					
					<h1 class="c-form__ttl">記事更新</h1>
					
          <form class="c-form" action="{{ route('steps.update', ['step' => $step]) }}" method="post">
						@method('PATCH')
						@csrf

						@include('error_card_list')

						<div class="c-form__list">
							<label class="c-form__head">
								<div class="c-form__head__txt">タイトル<span class="c-form__label">必須</span></div>
								<input type="text" name="title" value="{{ old('title') ?? $step->title ?? '' }}" class="c-form__input" placeholder="タイトル">
							</label>
						</div>

						<div class="c-form__list">
							<label class="c-form__head">
								<div class="c-form__head__txt">カテゴリー<span class="c-form__label">必須</span></div>
								<select class="c-form__selectBox" name="category">
									<option value="0">選択してください</option>
									@foreach ($categories as $category)
											<option value="{{ $category->id }}" @if(old('category') == $category->id　|| $step->category_id == $category->id) selected @endif>{{ $category->name }}</option>
									@endforeach
								</select>
							</label>
						</div>

						<div class="c-form__list">
							<label class="c-form__head">
								<div class="c-form__head__txt">内容<span class="c-form__label">必須</span></div>
								<textarea name="comment" class="c-form__textarea" placeholder="記事内容">{{ old('comment') ?? $step->comment ?? '' }}</textarea>
							</label>
						</div>
						
						<button type="submit" class="c-btn c-btn--primary">更新する</button>
          </form>
        </div>
			</section>
		</div>
	</div>
	{{-- フッター --}}
	@include('footer')
@endsection