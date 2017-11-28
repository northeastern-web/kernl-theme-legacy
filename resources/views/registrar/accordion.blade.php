@php($i = 0)

{{-- https://www.w3.org/TR/wai-aria-practices/#accordion --}}
<div id="accordion" class="accordion my--2@xs +clear">
  @while((have_rows('lay_tab')))
    @php(the_row())
    <div class="__item">
      <div class="__title collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#accordion_{{ $i }}" role="header" aria-expanded="false">
        <div role="button">{{ the_sub_field('txt_title') }}</div>
      </div>
      <div class="collapse" id="accordion_{{ $i }}" role="region">
        <div class="__copy +clearfix pr--1@xs">
          @include('registrar.alert')
          @if(have_rows('lay_actions'))
            <div class="f--r@sm ml--1@sm col --12@xs --4@sm px--0@xs">
              @include('registrar.actions')
            </div>
          @endif
          {{ the_sub_field('txt_copy') }}
        </div>
      </div>
    </div>
    @php($i++)
  @endwhile
</div>
