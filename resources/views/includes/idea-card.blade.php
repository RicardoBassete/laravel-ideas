<div class="card">
  <div class="px-3 pt-4 pb-2">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <img style="width:50px" class="me-2 avatar-sm rounded-circle"
          src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
        <div>
          <h5 class="card-title mb-0"><a href="#"> Mario
            </a></h5>
        </div>
      </div>
			<div>
				<form action="{{ route('ideas.destroy', ['id'=>$idea->id]) }}" method="POST">

					@if (Route::is('dashboard'))
						<a class="btn btn-success btn-sm" href="{{ route('ideas.show', [$idea->id]) }}">View</a>
					@endif

					@if (!Route::is('ideas.edit'))
						<a class="btn btn-info btn-sm" href="{{ route('ideas.edit', [$idea->id]) }}">Edit</a>
					@endif

					<button class="btn btn-danger btn-sm"> Delete </button>
					@method('delete')
					@csrf
				</form>
			</div>
    </div>
  </div>
  <div class="card-body">
		@if ($editing ?? false)
			<form action="{{route('ideas.update', [$idea->id])}}" method="post">
				<div class="mb-3">
					<textarea class="form-control" name="content" rows="3">{{ $idea->content }}</textarea>
					@error('idea')
						<span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
					@enderror
				</div>
				<div class="">
					<button type="submit" class="btn btn-success mb-3"> Update </button>
				</div>
				@method('put')
				@csrf
			</form>
		@else
			<p class="fs-6 fw-light text-muted">
				{{ $idea->content }}
			</p>
		@endif
    <div class="d-flex justify-content-between">
      <div>
        <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
          </span> {{ $idea->likes }} </a>
      </div>
      <div>
        <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
          {{ $idea->created_at }} </span>
      </div>
    </div>
    <div>
      <div class="mb-3">
        <textarea class="fs-6 form-control" rows="1"></textarea>
      </div>
      <div>
        <button class="btn btn-primary btn-sm"> Post Comment </button>
      </div>

      <hr>
      <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
          src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
        <div class="w-100">
          <div class="d-flex justify-content-between">
            <h6 class="">Luigi
            </h6>
            <small class="fs-6 fw-light text-muted"> 3 hour
              ago</small>
          </div>
          <p class="fs-6 mt-3 fw-light">
            and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
            Evil)
            by
            Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
            very
            popular during the Renaissan
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
