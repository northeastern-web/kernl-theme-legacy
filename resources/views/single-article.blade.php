@extends('chrome.app')

@section('content')
  <article class="article --single --kb-article">
    @while(have_posts()) @php(the_post())
      @include('templates.article.banner')

      <section class="section">
        <div class="row">
          <div class="col w--2/3@t">
            @include('templates._section')
          </div>
          <div class="col w--1/3@t">
            @include('templates.article._related')
            @include('templates.article._actions')
          </div>
        </div>
      </section>
    </article>
  @endwhile
@endsection
