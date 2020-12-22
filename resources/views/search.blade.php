@extends('chrome.app')

@section('content')
@include('components.header')

@if (! have_posts())
<x-alert type="warning">
  {!! __('Sorry, no results were found.', 'sage') !!}
</x-alert>

{!! get_search_form(false) !!}
@endif

@while(have_posts()) @php(the_post())
@include('templates.search.list-item')
@endwhile

{!! get_the_posts_navigation() !!}
@endsection