@php
$__env = App\sage('blade');
global $post;
$post = $module;
setup_postdata($post);
@endphp

@while(the_flexible_field('lay_module'))
  <div class="row">
    @foreach(get_sub_field('lay_gallery') as $item)
      <div class="col  {{ (isset($class) ? $class : 'w--1/2 w--1/3@d') }}">
        <a href="{{ $item['url'] }}" class="gallery" title="{{ $item['caption'] }}" data-lightbox-gallery="gallery">
          <div class="card">
            <img src="{{ $item['url'] }}" alt="{{ $item['title'] }}">
          </div>
        </a>
      </div>
    @endforeach
  </div>

  @if(get_sub_field('txt_gallery'))
    <div class="fs--sm">
      {{ the_sub_field('txt_gallery') }}
    </div>
  @endif
@endwhile
@php(wp_reset_postdata())
