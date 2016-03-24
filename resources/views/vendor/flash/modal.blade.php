<div class="reveal" id="flash-overlay-modal" data-reveal>
    <div class="callout {{ Session::get('flash_notification.level') }}" >
            <h4 class="modal-title">{{ $title }}</h4>
            <div class="modal-body">
                <p>{!! $body !!}</p>
            </div>
        {{ Session::get('flash_notification.message') }}
    </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
