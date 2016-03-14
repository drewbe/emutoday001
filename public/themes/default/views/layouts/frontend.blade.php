<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@@yield('title') &mdash; EMU TODAY</title>
        <link rel="stylesheet" type="text/css" href="{{ theme('css/frontend.css') }}" >
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">
                        <img src="{{ theme('images/logo.png') }}" alt="The Sunday Sim">
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    @include('partials.navigation')

                </ul>
            </div>
        </nav>

        <div class="container">
          <div id="app">
            <alert type="error">
              <strong>Error</strong> Tour Account is error
            </alert>
            <alert type="success">
              <strong>Success</strong> Tour Account is updated
            </alert>

          </div>
            <div class="row">
                <div class="col-md-12">@yield('content')</div>
            </div>
        </div>

        <script src="{{ theme('js/main.js') }}"></script>
    </body>
</html>
