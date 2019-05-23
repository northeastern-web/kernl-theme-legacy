@php
  $hasmodal = (get_the_content() || get_field('txt_email') || get_field('txt_phone') ? true : false);
@endphp

<article class="card --profile {{ (isset($class) ? $class : '') }}">
  @if($hasmodal)
  <a class="__link" href="#" data-toggle="modal" data-target="#modal_profile-{{ get_the_ID() }}">
  @endif
    <div class="__graphic ar--1x1">
      @if(get_field('med_headshot'))
        <img class="__graphic__img" src="{{ get_field('med_headshot')['url'] }}" alt="">
      @endif
    </div>

    <div class="__body py--1">
      <h2 class="__title">{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}</h2>
      @if(get_field('txt_title'))
        <div class="__subtitle">{{ the_field('txt_title') }}</div>
      @endif
    </div>

  @if($hasmodal)
    <div class="__footer">
      <div class="__column"><i data-feather="more-vertical" class="--sm"></i>View Profile</div>
    </div>
  </a>
  @endif
</article>

@php
  if($hasmodal) {
    include \App\template_path(locate_template('views/templates/profile/modal.blade.php'));
  }
@endphp
