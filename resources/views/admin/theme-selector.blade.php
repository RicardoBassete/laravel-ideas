@if (Route::is('admin.theme'))
	<form action="{{ route('admin.theme.update') }}" method="POST">
		@csrf
		<div class="mb-3">
			<label for="theme" class="form-label">@lang('theme.themes'):</label>
			<select name="theme" id="theme" class="form-select">
				@foreach ($themes as $theme)
					@if ($theme == $currentTheme)
						<option selected value="{{$theme}}">{{$theme}}</option>
					@else
						<option value="{{$theme}}">{{$theme}}</option>
					@endif
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-primary">@lang('theme.submit')</button>
	</form>
@endif
