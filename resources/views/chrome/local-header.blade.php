<header class="{{ \Kernl\Lib\Masthead::getClass() }}">
  <a class="masthead_logo" href="{{ home_url('/') }}">
    <img class="masthead_image" alt="Logo" src="{{ \Kernl\Lib\Masthead::getLogo() }}">
  </a>

  <div class="masthead_toggle">
    <button type="button" class="nav_handle hidden-up@d">
      <span class="sr-only">Menu</span>
    </button>
  </div>
  <nav class="masthead_nav nav" data-navigation-handle=".nav_handle" data-navigation-content=".masthead_toggle">
    <div class="w-100 d-flex justify-between hidden-up@d">
      <a class="masthead_logo pl-1 mb-0h" href="#">
        <img class="masthead_image" alt="Logo" src="{{ \Kernl\Lib\Masthead::getLogo() }}">
      </a>
      <button type="button" class="nav_handle hidden-up@d mr-1">
        <span class="sr-only">Close Menu</span>
      </button>
    </div>
    <div class="masthead_search input_enclosed -search bg-gray-50 mx-1 mb-3h hidden-up@d pl-1 br">
      <label class="sr-only">Search</label>
      <input type="text" placeholder="Search by keyword">
      <button type="submit" class="btn">Go</button>
    </div>

    @if ($navBar)
      <div class="masthead_navbar">
        <a class="masthead_navbar_id" href="{{ home_url('/') }}">
          {{ get_bloginfo('name') }}
        </a>
        <ul class="nav_list">
          @foreach ($navBar as $item)
            <li class="nav_item {!! ($item->children ? '+children' : '') !!}">
              <a class="nav_link {{ $item->classes }}" href="{{ $item->url }}"
                {!! ($item->active || $item->activeAncestor) ? 'aria-current="true"' : '' !!}
                {!! $item->children ? 'aria-haspopup="true" aria-expanded="false"' : '' !!}>
                {{ $item->label }}
              </a>

              @if ($item->children)
                <ul class="nav_sublist" aria-expanded="false">
                  <li class="nav_back"><a href="#">Previous</a></li>
                  <li class="nav_subitem hidden-up@d">
                    <a class="nav_sublink {{ $item->classes }}" href="{{ $item->url }}">{{ $item->label }}</a>
                  </li>
                  @foreach ($item->children as $child)
                    <li class="nav_subitem">
                      <a class="nav_sublink {{ $child->classes }}" href="{{ $child->url }}">{{ $child->label }}</a>
                    </li>
                  @endforeach
                </ul>
              @endif
            </li>
          @endforeach
        </ul>
      </div>
    @endif

    @if ($navCentral)
      <div class="masthead_central">
        <ul class="nav_list">
          @foreach ($navCentral as $item)
            @if ($item->label != 'Search')
              <li class="nav_item {!! ($item->children ? '+children' : '') !!}">
                <a class="nav_link {{ $item->classes }}" href="{{ $item->url }}"
                  {!! ($item->active || $item->activeAncestor) ? 'aria-current="true"' : '' !!}
                  {!! $item->children ? 'aria-haspopup="true" aria-expanded="false"' : '' !!}>
                  {!! $item->label !!}
                </a>

                @if ($item->children)
                  <ul class="nav_sublist" aria-expanded="false" data-depth="0">
                    <li class="nav_back tt-caps"><a href="#">Previous</a></li>
                    <li class="nav_subitem hidden-up@d">
                      <a class="nav_sublink {{ $item->classes }} fw-700" href="{{ $item->url }}">{{ $item->label }}</a>
                    </li>
                    @foreach ($item->children as $child)
                      <li class="nav_subitem">
                        <a class="nav_sublink {{ $child->classes }}" href="{{ $child->url }}">{{ $child->label }}</a>
                      </li>
                    @endforeach
                  </ul>
                @endif
              </li>
            @else ($item->label == 'Search')
              <li class="nav_item +icon">
                <a class="nav_link" href="#" data-swap-target="#modal_search" data-toggle="modal" aria-label="modal_trigger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </div>
    @endif

    @if ($navSupport)
      <ul class="nav_list masthead_support">
        @foreach ($navSupport as $item)
          <li class="nav_item {!! ($item->children ? '+children' : '') !!}">
            <a class="nav_link {{ $item->classes }}" href="{{ $item->url }}"
              {!! ($item->active || $item->activeAncestor) ? 'aria-current="true"' : '' !!}
              {!! $item->children ? 'aria-haspopup="true" aria-expanded="false"' : '' !!}>
              {!! $item->label !!}
            </a>
          </li>
        @endforeach
      </ul>
    @endif
  </nav>
</header>
