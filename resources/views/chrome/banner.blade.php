<header {!! $style !!} class="{{ \Kernl\Lib\Utility::getOptClass('banner', 'get_field') }} {!! $cssClass ?? '' !!}">
  <x-header element="div" :pretitle=$pretitle :title=$title :subtitle=$subtitle />
</header>
