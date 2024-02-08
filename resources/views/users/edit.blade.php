@extends('layout.layout')

@section('content')
  <div class="row">

		@include('includes.main-links')

    <div class="col-6">

			@include('includes.success-message')

			<div class="mt-3">
				@include('includes.user-edit-card')
			</div>

			@forelse ($ideas as $idea)
				<div class="mt-3">
					@include('ideas.shared.idea-card')
				</div>
			@empty
				<p class="text-center mt-4">No Ideas Found.</p>
			@endforelse

			<div class="mt-3">
				{{$ideas->withQueryString()->links()}}
			</div>


    </div>
    <div class="col-3">

			@include('includes.search-bar')

      @include('includes.who-to-follow')

    </div>
  </div>
@endsection
