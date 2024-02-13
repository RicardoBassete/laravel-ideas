@extends('layout.layout')

@section('title', 'Admin')

@section('content')
  <div class="row">

		<h1>@lang('admin.title')</h1>

		<form action="{{ route('admin.theme') }}" method="POST">
			@csrf
			<div class="mb-3">
				<label for="theme" class="form-label">Themes:</label>
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
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

  </div>
@endsection
