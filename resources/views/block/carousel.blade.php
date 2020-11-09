@hassub('carousel')
  @set($i, 0)

  <div class="carousel" data-carousel-options='{{!! (!empty($options) ? implode($options, ', ') : "") !!}}'>
    @fields('carousel')
      <div class="@sub('cssClass')">
          @sub('wysiwyg')
      </div>
      @set($i, $i+1)
    @endfields
  </div>
@endsub
