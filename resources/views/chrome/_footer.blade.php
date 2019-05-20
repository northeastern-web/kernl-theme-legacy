@if(get_field('bool_chrome_footer', 'option'))
  <footer role="contentinfo">
    <div id="nu__global-footer">
      {!! \Kernl\Lib\NU::chromeFooter() !!}
    </div>
  </footer>
@else
  {!! \Kernl\Lib\NU::chromeFooter(true) !!}
@endif
