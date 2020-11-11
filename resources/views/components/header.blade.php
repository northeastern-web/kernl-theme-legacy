{{-- $el: toggles between header/div depending on wrapper --}}
@set($el, 'header')
@istrue($element)
  @set($el, $element)
@endistrue

<{!! $el !!} class="section_header">
  @istrue($pretitle)
    <div class="section_pretitle">{!! $pretitle !!}</div>
  @endistrue

  @istrue($title)
    <h1 class="section_title">{!! $title !!}</h1>
  @endistrue

  @istrue($subtitle)
    <div class="section_subtitle">{!! $subtitle !!}</div>
  @endistrue
</{!! $el !!}>
