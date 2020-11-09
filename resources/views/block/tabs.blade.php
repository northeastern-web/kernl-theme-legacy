@hassub('lay_tabs')
  <nav id="tabs_{{ $i_section }}_{{ $i_col }}" class="{{ \Kernl\Lib\Utility::getOptClass('nav -inline') }}">
    <ul class="nav_list" role="tablist">
      @set($i, 0)
      @fields('lay_tabs')
        <li class="nav_item">
          <a id="tabtrigger_{{ $i_section }}_{{ $i_col }}_{{ $i }}" class="nav_link" href="#"
            data-swap-target="#tab_{{ $i_section }}_{{ $i_col }}_{{ $i }}"
            aria-selected="{{ ($i == 0 ? 'true' : 'false') }}"
            data-toggle role="tab"
            data-swap-group="tabs_{{ $i_section }}_{{ $i_col }}">@sub('title')</a>
        </li>
        @set($i, $i+1)
      @endfields
    </ul>
  </nav>

  <div class="pt-1">
    @set($i, 0)
    @fields('lay_tabs')
      <div id="tab_{{ $i_section }}_{{ $i_col }}_{{ $i }}" role="tabpanel"
        aria-hidden="{{ ($i == 0 ? 'false' : 'true') }}"
        aria-labelledby="tabtrigger_{{ $i_section }}_{{ $i_col }}_{{ $i }}">
        @sub('copy')
      </div>
      @set($i, $i+1)
    @endfields
  </div>
@endsub
