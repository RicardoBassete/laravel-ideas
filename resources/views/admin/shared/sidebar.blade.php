<div class="col-3">
  <div class="card overflow-hidden">
    <div class="card-body pt-3">
      <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('admin.dashboard') }}">
            <span>@lang('admin.title')</span>
					</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.theme') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('admin.theme') }}">
            <span>@lang('theme.selector')</span>
					</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('admin.users') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('admin.users') }}">
            <span>Users</span>
					</a>
        </li>
      </ul>
    </div>
    <div class="card-footer text-center py-2">
      <a class="btn btn-link btn-sm text-decoration-underline" href="{{ route('lang', 'en') }}"> en </a>
      <a class="btn btn-link btn-sm text-decoration-underline" href="{{ route('lang', 'pt_BR') }}"> pt-br </a>
    </div>
  </div>
</div>
