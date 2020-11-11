@extends('chrome.app')

@section('content')
<article class="article -single">
  @while(have_posts()) @php(the_post())
  <x-banner cssClass="-measure-wide -center" />
  <section class="section">
    <div class="row">
      <div class="col w-90@t w-3/4@d w-2/3@w mx-auto">
        @hasfield('hasExternalLink')
        <a class="d-block mb-2 pa-1 bg-gray-100 ta-c" href="@field('url', 'url')">
          @field('url', 'title')
        </a>
        @endfield

        {!! the_content() !!}

      </div>
    </div>
  </section>
  @endwhile
</article>
@endsection