@if(get_field('bool_chrome_footer', 'option'))
  <footer role="contentinfo">
    <div id="nu__global-footer">
      {!! \Kernl\NU\Support::chromeFooter() !!}
    </div>
  </footer>
@else
  {!! \Kernl\NU\Support::chromeFooter(true) !!}
@endif
