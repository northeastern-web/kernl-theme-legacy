@if(have_rows('lay_actions'))
  <aside class="alert --outline f--r@sm col --3@sm pa--0@xs">
    <div class="__body">
      @while(have_rows('lay_actions'))
        @php(the_row())
        <ul class="list--unstyled">
          <li>
            {!! (get_sub_field('rel_action') ? "<h6>". get_sub_field('rel_action')->name .'</h6>' : '') !!}
            <a href="{{ get_sub_field('txt_url') }}">{{ get_sub_field('txt_title') }}</a><br>
          </li>
        </ul>
      @endwhile
    </div>
  </aside>
@endif
