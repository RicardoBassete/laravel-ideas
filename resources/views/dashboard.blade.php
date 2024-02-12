@extends('layout.layout')

@section('title')
	{{ Route::is('dashboard') ? 'Dashboard' : '' }}
	{{ Route::is('feed') ? 'Feed' : '' }}
@endsection

@section('content')
  <div class="row">

		@include('includes.main-links')

    <div class="col-6">

			@include('includes.success-message')
			@include('ideas.shared.submit-idea')

      <hr>

			@forelse ($ideas as $idea)
				<div class="mt-3">
					@include('ideas.shared.idea-card')
				</div>
			@empty
				<p class="text-center mt-4">No Results Found.</p>
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
