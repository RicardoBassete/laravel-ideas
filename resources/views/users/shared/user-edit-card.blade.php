<div class="card">
  <div class="px-3 pt-4 pb-2">
    <form enctype="multipart/form-data" action="{{route('users.update', $user->id)}}" method="POST">
			@csrf
			@method('put')
      <div class="d-flex align-items-start justify-content-between">
        <div class="d-flex align-items-center">
          <img style="width:150px" class="me-3 avatar-sm rounded-circle"
						src="{{$user->getImageURL()}}" alt="{{$user->name}} Avatar">
          <div>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            @error('name')
              <span class="text-danger fs-6">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="d-flex flex-column align-items-end h-100">
          @auth
            <div>
              <a class="btn btn-success btn-sm" href="{{ route('users.show', $user->id) }}">View</a>
            </div>
          @endauth
        </div>
      </div>
      <div class="mt-2">
        <label for="">Profile Picture</label>
        <input type="file" name="image" class="form-control">
        @error('image')
          <span class="text-danger fs-6">{{ $message }}</span>
        @enderror
      </div>
      <div class="px-2 mt-4">
        <h5 class="fs-5"> Bio: </h5>
        <diV class="mb-3">
          <textarea class="form-control" name="bio" rows="3">{{ $user->bio }}</textarea>
          @error('bio')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
          @enderror
        </diV>

        <button class="btn btn-info btn-sm mb-3">Save</button>

        @include('users.shared.user-stats')

      </div>
    </form>
  </div>
</div>
<hr>
