<div class="col-3">
  <div class="card overflow-hidden">
    <div class="card-body pt-3">
      <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
        <li class="nav-item">
          <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('dashboard') }}">
            <span>@lang('main_links.home')</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('feed') }}">
            <span>@lang('main_links.feed')</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('terms') }}">
            <span>
							@lang('main_links.terms')
						</span>
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
