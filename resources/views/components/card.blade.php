<article class="{{ \Kernl\Lib\Utility::getOptClass('card '. ($cssClass ?? $cssClass)) }}">
  @istrue($link)
    <a class="card_link" href="{{ $link }}">
  @endif

    @istrue($image)
    <div class="card_media {{ $media }}">
        <img class="card_img" src="{{ $image }}" alt="{{ $alt }}">
      </div>
    @endistrue

    @istrue($header)
      <header class="card_header">
        @foreach (explode('|', $header) as $headerColumn)
          <div class="card_column">{!! $headerColumn !!}</div>
        @endforeach
      </header>
    @endistrue

    <div class="card_body">
      @istrue($title)
        <h2 class="card_title">
          @if (get_post_type() == 'profile')
            @field('fname') @field('lname')
          @else
            {!! $title !!}
          @endif
        </h2>
      @endistrue

      @istrue($subtitle)
        <div class="card_subtitle">{!! $subtitle !!}</div>
      @endistrue
      @if (get_post_type() != 'profile')
        <div>{!! $excerpt !!}</div>
      @endif
    </div>

    @istrue($footer)
      <footer class="card_footer">
        @foreach (explode('|', $footer) as $footerColumn)
          <div class="card_column bwa-0 bwb-2 bc-none group-hover:bc-red">{!! $footerColumn !!}</div>
        @endforeach
      </footer>
    @endistrue
  @istrue($link)</a>@endistrue
</article>

@if (get_post_type() == 'profile')
    <div class="modal"
      id="{{ get_post_field( 'post_name')}}"
      tabindex="-1" role="dialog"
      aria-labelledby="modal-trigger-{{ get_post_field( 'post_name') }}"
      aria-hidden="true">
    <div class="modal_screen" toggle-dismiss></div>
    <div class="modal_body bg-white d-block">
      <div class="w-40 f-r@d mt-1 ml-2@d mb-2 pos-relative of-visible">
          @hasfield('image')
            <img src="@field('image','url')">
          @endfield
        </div>
        <h2 class="fs-d4 fw-700 mb-0h pt-1@d">@field('fname') @field('lname')</h2>
        <h3>@field('title')</h3>

        @if(get_field('email') || get_field('phone'))
          <ul class="ls-none">
            @hasfield('email')
              <li>
                <b>Email:</b> <a class="tc-blue" href="mailto:@field('email')">@field('email')</a>
              </li>
            @endfield
            @hasfield('phone')
              <li>
                <b>Phone:</b> <a class="tc-blue" href="tel:@field('phone')">@field('phone')</a>
              </li>
            @endfield
          </ul>
        @endif

        {!! the_content() !!}
    </div>

    <button type="button" class="modal_close" toggle-dismiss aria-label="Close"><i data-feather="x"></i></button>
  </div>
@endif
