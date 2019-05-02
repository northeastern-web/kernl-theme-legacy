@php
global $post;
$post = $module;
setup_postdata($post);
@endphp

@while(the_flexible_field('lay_module'))
  @if(get_sub_field('opt_type') == 'js')
    <script type="text/javascript">
      {{ the_sub_field('txt_code') }}
    </script>
  @else
    @php
      try {
        eval(get_sub_field('txt_code'));
      } catch (ParseError $e) {
        echo '
          <div class="bg--yellow pa--1 fs--xs">
            <b>Caught exception:</b>
            <code>'. $e->getMessage() . '</code>
          </div>';
      }
    @endphp
  @endif
@endwhile

@php(wp_reset_postdata())
