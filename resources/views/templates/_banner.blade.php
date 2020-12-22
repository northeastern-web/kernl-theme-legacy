@php
  $app    = new App\View\Composers\App;
  $option = (is_singular() ? get_the_ID() : get_queried_object());
  $layout = new \Kernl\Lib\Layout($option);
  $args = [
    'title' => (isset($title) ? $title : $app->with()->title),
    // 'pretitle' => (isset($pretitle) ? $pretitle : $app->with()->pretitle()),
    // 'subtitle' => (isset($subtitle) ? $subtitle : $app->with()->subtitle()),
    'nav_parent' => true,
    'class' => (isset($class) ? $class : '')
  ];
@endphp

{!! $layout->displayHeader($args) !!}
