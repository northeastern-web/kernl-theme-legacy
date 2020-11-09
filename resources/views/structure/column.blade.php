<div class="{{ \Kernl\Lib\Utility::getOptClass('col') }}">
  @layouts('blocks')
    @includeIf('block.' . get_row_layout())
  @endlayouts
</div>
