{{-- strange inifinite loops without setting up post with setup_postdata() --}}

@global($post)
@set($post, get_sub_field('cptModules'))
@php(setup_postdata($post))

@layouts('module')
  @includeIf('block.' . get_row_layout())
@endlayouts

@php(wp_reset_postdata())
