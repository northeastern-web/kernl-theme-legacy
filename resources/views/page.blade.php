@extends('layouts.app')

@section('content')
<article class="article --page">
    @include('layouts.chrome.header-singular')

    @if (\Kernl\Navigation::display() && !get_field('bool_header_nav'))
      <section class="section">
        <div class="row">
          <div class="col --12@xs --3@lg">
            @include('components.nav-page')
          </div>
          <div class="col --12@xs --9@lg">
            @include('layouts.sections.section')
          </div>
        </div>
      </section>
    @else
      @include('layouts.sections.section')
    @endif
</article>
@endsection
