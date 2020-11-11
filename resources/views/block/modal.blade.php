@hassub('id')
  <div class="modal" id="@sub('id')" tabindex="-1" role="dialog" aria-labelledby="modal-trigger-@sub('id')" aria-hidden="true">
    <div class="modal_screen" toggle-dismiss></div>
    <div class="modal_body @sub('cssClass')">
      @sub('wysiwyg')
    </div>

    <button type="button" class="modal_close" toggle-dismiss aria-label="Close"><i data-feather="x"></i></button>
  </div>
@endsub
