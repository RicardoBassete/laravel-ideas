@extends('layout.layout')

@section('title', 'Admin')

@section('content')
  <div class="row">

		<h1>@lang('admin.title')</h1>

		@if (!Route::is('admin.theme'))
			<a href="{{route('admin.theme')}}" class="btn btn-primary col-2">@lang('theme.selector')</a>
		@endif

		@include('admin.theme-selector')

  </div>
@endsection
