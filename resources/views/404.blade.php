@extends('chrome.app')

@section('content')
@include('components.header')
<article>
  <div class="section">
    @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
    </x-alert>
  
    {!! get_search_form(false) !!}
    @endif
  </div>
</article>
@endsection