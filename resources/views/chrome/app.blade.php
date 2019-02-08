<!doctype html>
<html @php(language_attributes()) @php(body_class()) id="html">

  @include('chrome._head')

  <body {!! (get_field('bool_global_contain', 'option') ? 'class="contain"' : '') !!}>
    <a class="skip alert" href="#main_content">Skip to main content</a>

    <!--[if IE]>
      <div class="bg--beige fs--sm pa--1 pa--2@d">
        <b><i>Note</i></b>: You are using an <strong>outdated</strong> browser. Please <a class="tc--red" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
      </div>
    <![endif]-->

    {!! \Kernl\Utility::getTagManager(\WP_ENV) !!}

    @php(do_action('get_header'))

    @include('chrome._masthead')

    <main id="main_content" role="document">
      @yield('content')

      {{ (is_singular() ? edit_post_link('<i data-feather="edit"></i></span><span class="edit-text">Edit ' . (is_single() ? 'Post' : 'Page') . '', '', '', 0, 'post-edit-link btn --sm bg--blue') : '') }}
    </main>

    @php(do_action('get_footer'))

    @include('chrome._footer')

    @include('templates.search._modal')

    @php(wp_footer())
    @if(get_field('bool_chrome_header', 'option') || get_field('bool_chrome_footer', 'option'))
      <script src="{{ \Kernl\Utility::getBrandChrome('js') }}"></script>
    @endif
    {!! \Kernl\Utility::getGoogleAnalytics(\WP_ENV, get_field('txt_analytics','option')) !!}
  </body>
</html>
