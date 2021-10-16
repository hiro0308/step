@if ($errors->any())
	<div class="p-errorArea">
		<ul class="p-errorArea__list">
			@foreach ($errors->all() as $error)
				<li class="p-errorArea__item">
					{{ $error }}
				</li>
			@endforeach
		</ul>
	</div>
@endif