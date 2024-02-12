@extends('layout.layout')

@section('title', 'Terms')

@section('content')
  <div class="row">

		@include('includes.main-links')

    <div class="col-6">
			<div>
				<h1>Terms</h1>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Id hic delectus velit, quod ducimus, laborum voluptas minus distinctio pariatur esse, aliquid laboriosam harum omnis. Hic dolores vitae similique modi enim!
			</div>
    </div>
    <div class="col-3">

			@include('includes.search-bar')

      @include('includes.who-to-follow')

    </div>
  </div>
@endsection

