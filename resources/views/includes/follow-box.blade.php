<div class="card mt-3">
  <div class="card-header pb-0 border-0">
    <h5 class="">@lang('follow-box.top_users')</h5>
  </div>
  <div class="card-body">
    @foreach ($topUsers as $topUser)
      <div class="hstack gap-2 mb-3">
        <div class="avatar">
          <a href="{{route('users.show', $topUser->id)}}">
						<img class="avatar-img rounded-circle"
							width="50" height="50"
							src="{{$topUser->getImageURL()}}"
							alt="{{$topUser->name}}">
					</a>
        </div>
        <div class="overflow-hidden">
          <a class="h6 mb-0" href="{{route('users.show', $topUser->id)}}">{{ $topUser->name }}</a>
          <p class="mb-0 small text-truncate">{{$topUser->email}}</p>
        </div>
      </div>
    @endforeach
  </div>
</div>
