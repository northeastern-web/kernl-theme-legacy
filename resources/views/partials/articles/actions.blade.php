@if(have_rows('lay_actions'))
  <aside class="alert --blue-light f--r@sm col --12@xs --4@sm px--0@xs mt--1@xs">
    <div class="__header ta--c">Important Actions</div>
    <div class="__body">
      @while(have_rows('lay_actions'))
        @php(the_row())
        <ul class="fs--sm">
          <li>
            <a class="fw--700" href="{{ get_sub_field('txt_url') }}">{{ get_sub_field('txt_title') }}</a>
            {!! (get_sub_field('rel_action') ? ' <i>('. get_sub_field('rel_action')->name .')</i>' : '') !!}
          </li>
        </ul>
      @endwhile
    </div>
  </aside>
@endif
