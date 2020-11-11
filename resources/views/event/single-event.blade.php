@while(have_posts()) @php(the_post())
  <div class="row">
    <div class="col w-2/3@d bwr-1 pr-3 pb-1 mb-2 mr-3">
      {!! tribe_the_notices() !!}
      {!! the_content() !!}
    </div>
    <div class="col w-1/4@d">
      @if(tribe_get_event_website_url())
        <p><a target="_blank" class="btn -right -block bg-red mb-2" href="<?= tribe_get_event_website_url(); ?>">Register Now <i data-feather="arrow-right"></i></a></p>
      @endif
      @if(tribe_get_venue())
        <div class="fw-300 fs-sm tt-caps mb-1">Event Location</div>
      @endif
      <p>{!! '<b>' . tribe_get_venue() . '</b>' . (tribe_address_exists() ? '<br>'. tribe_get_full_address() : '') !!}</p>
      {!! tribe_get_event_categories(null, ['label_before' => '<div class="fw-300 fs-sm tt-caps mb-1">', 'wrap_before' => '<ul class="fs-sm">']) !!}
    </div>
  </div>
@endwhile
