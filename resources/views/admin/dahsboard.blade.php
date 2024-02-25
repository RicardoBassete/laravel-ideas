@extends('layout.layout')

@section('title', 'Admin')

@section('content')
  <div class="row">

		@include('admin.shared.sidebar')


		@include('admin.shared.main')
		@include('admin.shared.theme-selector')
		@include('admin.users.index')

  </div>
@endsection
