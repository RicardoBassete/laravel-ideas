<div class="card">
  <div class="px-3 pt-4 pb-2">
    <div class="d-flex align-items-start justify-content-between">
      <div class="d-flex align-items-center">
        <img style="width:150px" class="me-3 avatar-sm rounded-circle"
          src="{{$user->getImageURL()}}" alt="{{$user->name}} Avatar">
        <div>
					<h3 class="card-title mb-0"><a href="#"> {{$user->name}} </a></h3>
					<span class="fs-6 text-muted">{{$user->email}}</span>
        </div>
      </div>
			<div class="d-flex flex-column align-items-end h-100">
				@auth
					<div>
						<a class="btn btn-info btn-sm" href="{{route('users.edit', $user->id)}}">Edit</a>
					</div>
				@endauth
			</div>
    </div>
    <div class="px-2 mt-4">
      <h5 class="fs-5"> Bio: </h5>
			<p class="fs-6 fw-light">
				{{$user->bio}}
			</p>

			@include('includes.user-stats')

			@auth
				@if (Auth::id() !== $user->id)
					<div class="mt-3">
						<button class="btn btn-primary btn-sm"> Follow </button>
					</div>
				@endif
			@endauth
    </div>
  </div>
</div>
<hr>
