<div class="card">
	<div class="card-header pb-0 border-0">
		<h5 class="">@lang('search.search')</h5>
	</div>
	<div class="card-body">
		<form action="{{route('dashboard')}}" method="GET">
			<input placeholder="@lang('search.search')..." class="form-control w-100" type="text" name="search" value="{{ request()->get('search', '') }}">
			<button type="submit" class="btn btn-dark mt-2">@lang('search.search')</button>
		</form>
	</div>
</div>
