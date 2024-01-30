@extends('layout.layout')

@section('content')
  <div class="row">

		@include('includes.main-links')

    <div class="col-6">

			@include('includes.success-message')

			<div class="mt-3">
				@include('includes.idea-card')
			</div>


    </div>
    <div class="col-3">

			@include('includes.search-bar')

      @include('includes.who-to-follow')

    </div>
  </div>
@endsection
