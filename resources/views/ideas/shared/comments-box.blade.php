<div>
  <form action="{{ route('comments.store', ['id' => $idea->id]) }}" method="POST">
    @csrf
    <div class="mb-3">
      <textarea class="fs-6 form-control" rows="1" name="content"></textarea>

      @error('content')
        <span class="d-block fs-6 text-danger mb-3">{{ $message }}</span>
      @enderror

    </div>
    <div>
      <button class="btn btn-primary btn-sm"> @lang('comments.post_comment') </button>
    </div>
  </form>
  @foreach ($idea->comments as $comment)
		<hr>
    <div class="d-flex align-items-start">
      <img style="width:35px" class="me-2 avatar-sm rounded-circle"
        src="{{ $comment->user->getImageURL() }}" alt="{{ $comment->user->name }}">
      <div class="w-100">
        <div class="d-flex justify-content-between">
          <h6 class="">
						<a href="{{route('users.show', $comment->user->id)}}">
							{{ $comment->user->name }}
						</a>
					</h6>
          <small class="fs-6 fw-light text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        </div>
        <p class="fs-6 mt-3 fw-light">
          {{ $comment->content }}
        </p>
      </div>
    </div>
  @endforeach
</div>
