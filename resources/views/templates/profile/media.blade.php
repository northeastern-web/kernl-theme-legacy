@php
  $hasmodal = (get_the_content() || get_field('txt_email') || get_field('txt_phone') ? true : false);
@endphp

<div class="media {{ (isset($class) ? $class : '') }}">
  <a class="__link" href="#" {!! ($hasmodal ? 'data-toggle="modal" data-target="#modal_profile-'. get_the_ID() .'"' : '') !!}>
    @if(get_field('med_headshot'))
      <div class="__graphic">
        <img class="__graphic__img" src="{{ get_field('med_headshot')['url'] }}" alt="">
      </div>
    @endif

    <div class="__body">
      <h5 class="__title">{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}</h5>

      @if(get_field('txt_title'))
        <div>{{ the_field('txt_title') }}</div>
      @endif

      @if(get_field('txt_email'))
        <div class="fs--xs pt--0h">{{ the_field('txt_email') }}</div>
      @endif
    </div>
  </a>
</div>

@php
  if($hasmodal) {
    include \App\template_path(locate_template('views/templates/profile/modal.blade.php'));
  }
@endphp
