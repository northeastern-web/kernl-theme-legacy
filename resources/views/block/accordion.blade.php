@hassub('accordion')
  @set($i, 0)
  @fields('accordion')
    <div class="{{ \Kernl\Lib\Utility::getOptClass('accordion') }}">
      <a id="accordiontrigger_{{ $i_section }}_{{ $i_col }}_{{ $i }}" class="accordion_link" href="#"
        data-swap-target="#accordion_{{ $i_section }}_{{ $i_col }}_{{ $i }}"
        data-toggle data-swap-options='{"collapse":true}' role="tab"
        data-swap-group="accordion_{{ $i_section }}_{{ $i_col }}">
          @sub('title')
      </a>
      <div id="accordion_{{ $i_section }}_{{ $i_col }}_{{ $i }}" class="accordion_body" role="tabpanel"
        aria-hidden="true" aria-labelledby="accordiontrigger_{{ $i_section }}_{{ $i_col }}_{{ $i }}">
        @sub('copy')
      </div>
    </div>
    @set($i, $i+1)
  @endfields
@endsub
