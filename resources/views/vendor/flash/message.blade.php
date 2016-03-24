@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])

    @else
        <div class="callout {{ session('flash_notification.level') }}" data-closable>
            <button class="close-button" aria-label="Close alert" type="button" data-close>
                <span aria-hidden="true">&times;</span>
            </button>

            {!! session('flash_notification.message') !!}
        </div>
    @endif
@endif
