{{--
  Template Name: Custom Template
--}}

@extends('chrome.app')

@section('content')
  @while(have_posts()) @php(the_post())
  <article>
      @include('templates._banner')
      <div class="section">
        @include('templates._section')
      </div>
    </article>
  @endwhile
@endsection
