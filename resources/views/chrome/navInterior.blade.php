@if(isset($navInterior->nav))
  <div class="hidden-up@t ta-r pb-1 np">
    <button class="btn -sm bc-gray-600" id="menu_toggle" data-swap-target="#page_menu" data-toggle data-swap-options='{"collapse":true}'>
      <i data-feather="align-left"></i> Page Menu
    </button>
  </div>

  <nav class="nav -interior mb-1" id="page_menu" aria-hidden="true" role="navigation" aria-labelledby="menu_toggle">
    <ul class="nav_list">
      @if(isset($navInterior->rootAncestor))
        <li class="nav_item nav_title">
          <a class="nav_link" href="{{ get_permalink($navInterior->rootAncestor) }}">
            <i data-feather="corner-left-up"></i> {{ $navInterior->rootAncestor->post_title }}
          </a>
        </li>
      @endif
      @foreach ($navInterior->nav as $navItem)
        <li class="nav_item">
          <a class="nav_link" href="{{ get_permalink($navItem->ID) }}" {!! (get_the_ID() == $navItem->ID ? 'aria-current="true"' : '') !!}>
            {{ $navItem->post_title }}
          </a>
          @if($navItem->children)
            <ul class="nav_sublist" style="display:block">
              @foreach ($navItem->children as $navSubItem)
                <li class="nav_subitem">
                  <a class="nav_sublink" href="{{ get_permalink($navSubItem->ID) }}" {!! (get_the_ID() == $navSubItem->ID ? 'aria-current="true"' : '') !!}>
                    {{ $navSubItem->post_title }}
                  </a>
                </li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
    </ul>
  </nav>
@endif
