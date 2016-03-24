@if(Session::has('flash_notification.message'))
    <div class="callout {{ Session::get('flash_notification.level') }}" data-closable>
        <button class="close-button" aria-label="Close alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>

        {{ Session::get('flash_notification.message') }}
    </div>
@endif
