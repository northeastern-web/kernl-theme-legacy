@php
global $post;
$post = $module;
setup_postdata($post);
@endphp

@while(the_flexible_field('lay_module'))
  <div class="carousel" data-carousel-options='{{!! implode(get_sub_field('opt_options'), ', ') !!}}'>
    @while(the_repeater_field('lay_carousel'))
      <div class="__item {{ the_sub_field('txt_class') }}">
        {{ the_sub_field('txt_copy') }}
      </div>
    @endwhile
  </div>
@endwhile

@php(wp_reset_postdata())
