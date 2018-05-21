<?php if (get_field('bool_nunews')) : ?>
<div class="alert bg--black ta--c mt--2@xs">
  <a href="{{ the_field('txt_external_url') }}" class="__link">
    <div class="__body">
      <div class="__excerpt">
        Originally Published at
        <i>{{ (get_field('bool_nunews') ? 'News@Northeastern' : get_field('text_source')) }}</i>
        {{ (get_field('txt_author') ? 'by ' .get_field('txt_author') : '') }}
      </div>
    </div>
  </a>
</div>
<?php endif; ?>
