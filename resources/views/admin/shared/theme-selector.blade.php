@if (Route::is('admin.theme'))
  <div class="col-9">
		<h1>@lang('theme.themes')</h1>
    <form action="{{ route('admin.theme.update') }}" method="POST">
      @csrf
      <div class="mb-3">
        <select name="theme" id="theme" class="form-select">
          @foreach ($themes as $theme)
            @if ($theme == $currentTheme)
              <option selected value="{{ $theme }}">{{ $theme }}</option>
            @else
              <option value="{{ $theme }}">{{ $theme }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">@lang('theme.submit')</button>
    </form>
  </div>
@endif
