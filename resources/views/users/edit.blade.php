@extends('layout.layout')

@section('title', 'Edit User')

@section('content')
  <div class="row">

		@include('includes.main-links')

    <div class="col-6">

			@include('includes.success-message')

			<div class="mt-3">
				@include('users.shared.user-edit-card')
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

      @include('includes.follow-box')

    </div>
  </div>
@endsection
