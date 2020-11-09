@extends('chrome.app')

@section('content')
  <article>
    <x-banner />

    @if(isset($navInterior->nav))
      <div class="section">
        <div class="row">
          <div class="col w-1/4@t">
            @include('chrome.navInterior')
          </div>
          <div class="col w-3/4@t">
            @includeIf('structure.section')
          </div>
        </div>
      </div>
    @else
      @includeIf('structure.section')
    @endif
  </article>
@endsection
