@auth
  <h4> @lang('ideas.share_ideas') </h4>
  <div class="row">
    <form action="{{ route('ideas.store') }}" method="post">
      <div class="mb-3">
        <textarea class="form-control" name="content" rows="3"></textarea>
        @error('content')
          <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
      </div>
      <div class="">
        <button type="submit" class="btn btn-dark"> @lang('ideas.share') </button>
      </div>
      @csrf
    </form>
  </div>
@endauth
@guest
  <h4> @lang('ideas.login_to_share') </h4>
@endguest
