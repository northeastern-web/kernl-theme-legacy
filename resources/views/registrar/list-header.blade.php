<header class="__header --archive">
  <h2 class="__title {{ ($icon || get_field('txt_icon', get_term_by('term_id', $term, $taxonomy)) ? '+icon' : '') }}">
    <a class="__link mr--1@xs" href="{{ get_term_link(get_term_by('term_id', $term, $taxonomy)) }}">
      @if($icon || get_field('txt_icon', get_term_by('term_id', $term, $taxonomy)))
        <i class="__icon --thin text--red" data-feather="{{ ($icon ? $icon : get_field('txt_icon', get_term_by('term_id', $term, $taxonomy))) }}"></i>
      @endif

      {{ ($title ? $title : get_term_by('term_id', $term, $taxonomy)->name) }}
    </a>

    @if($q->found_posts > $count)
      <a class="btn --gray-500 --outline --xs" href="{{ get_term_link(get_term_by('term_id', $term, $taxonomy)) }}">{{ $q->found_posts }} Articles</a>
    @endif
  </h2>
</header>
