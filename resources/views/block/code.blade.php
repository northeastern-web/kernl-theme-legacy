@if ($type == 'js')
    <script type="text/javascript">
        {!! $code !!}
    </script>

@else
    @php
        try {
            eval(get_sub_field('code'));
        } catch (ParseError $e) {
        echo '
          <div class="bg-yellow pa-1 fs-xs">
            <b>Caught exception:</b>
            <code>'. $e->getMessage() . '</code>
          </div>';
      }
    @endphp

@endif
