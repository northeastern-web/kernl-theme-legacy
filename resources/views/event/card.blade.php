@php
  $has_badge = (!empty($hide_badge) ? false : true);
  $has_excerpt = (!empty($hide_excerpt) ? false : true);
@endphp

<article class="card fs-xs hover:bb-2-red {{ (isset($class) ? $class : '') }}">
  <a href="{{ the_permalink() }}" class="card_link" aria-label="{!! the_title() !!}">
    @if(get_the_category() && $has_badge)
      <header class="card_header{{ has_post_thumbnail() ? '' : ' pa-1' }}">
        <div class="card_column">
          <div class="badge -left {{ (get_field('radio_color', 'category_'.get_the_category()[0]->term_id) ? get_field('radio_color', 'category_'.get_the_category()[0]->term_id) : '') }}">
              {{ get_the_category()[0]->name }}
          </div>
        </div>
      </header>
    @endif

    @if(has_post_thumbnail())
      <div class="card_media">
        <img class="card_img" alt=""
          src="{{ the_post_thumbnail_url('large') }}"
          data-src="{{ the_post_thumbnail_url('large') }}">
      </div>
    @endif

    <section class="card_body">
      <div class="mb-0h tt-u fs-xs">
        {{ tribe_get_start_date(get_the_id(), false, 'M j') }} at {{ tribe_get_start_time() }}
      </div>

      <h2 class="card_title">{!! the_title() !!}</h2>

      @if($has_excerpt)
        {!! (has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 15)) !!}
      @endif
    </section>

    <footer class="card_footer">
      <div class="card_column tc-gray">
        View Event <i data-feather="arrow-right" class="-sm"></i>
      </div>
    </footer>
  </a>
</article>
