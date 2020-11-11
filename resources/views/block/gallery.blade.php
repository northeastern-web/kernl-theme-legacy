@hassub('gallery')
  @set($i, 0)

  <div class="row">
    @foreach(get_sub_field('gallery') as $item)
      <div class="col @sub('cssClass')">
        <a href="{{ $item['url'] }}" class="gallery" title="{{ $item['caption'] }}" data-lightbox-gallery="gallery">
          <div class="card">
            <img src="{{ $item['url'] }}" alt="{{ $item['title'] }}">
          </div>
        </a>
      </div>  
      @set($i, $i+1)
    @endforeach
  </div>

  @hassub('txt_gallery')
  <div class="fs--sm">
    @sub('txt_gallery')
  </div>
@endif
@endsub
