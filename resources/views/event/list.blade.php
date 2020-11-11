{{-- @include('event.modules.bar') --}}
{{-- @include('event.list.content') --}}

<div class="row col_stretch">
  @while (have_posts())
  @php(the_post())
  <div class="col w-1/3@d">
    @card
      {!! (has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20)) !!}
    @endcard
  </div>
  @endwhile
</div>
