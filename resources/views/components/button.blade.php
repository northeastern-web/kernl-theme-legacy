<a class="{{ \Kernl\Lib\Utility::getOptClass('btn') }} {!! ($iconPosition ? '-right' : '') !!}" href="{{ $link }}" {!! ($isModalTrigger ? 'id="modal-trigger-' . substr($link, 1) . '" data-swap-target="' . $link . '" data-toggle="modal"' : '') !!}>
  @if($icon && !$iconPosition)
    <i data-feather="{{ $icon }}"></i>
    {{ $text }}
  @else
    {{ $text }}
    @if($icon)
      <i data-feather="{{ $icon }}"></i>
    @endif
  @endif
</a>
