@hasfield('sections')
  @set($i_section, 0)
  @fields('sections')
    <section
      id="section-{{ $i_section }}"
      class="{{ \Kernl\Lib\Utility::getOptClass('section') }}"
      @hassub('image')style="background-image:url('@sub('image', 'url')')"@endsub>

      @hassub('hasTitles')
        <x-header :pretitle="get_sub_field('pretitle')" :title="get_sub_field('title')" :subtitle="get_sub_field('subtitle')" />
      @endsub

      @hassub('columns')
        @set($i_col, 0)
        <div class="row">
          @fields('columns')
            @includeIf('structure.column')
            @set($i_col, $i_col + 1)
          @endfields
        </div>
      @endsub
    </section>

    @set($i_section, $i_section + 1)
  @endfields
@endfield
