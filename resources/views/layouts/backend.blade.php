<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')  &mdash; EMU</title>
    @include('layouts.style')
    @include('layouts.headscripts')
  </head>

  <body>
    <nav class="navbar navbar-static-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">EMU TODAY</a>
        </div>
        <ul class="nav navbar-nav">
           <li><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
           <li><a href="{{ route('backend.users.index') }}">Users</a></li>
          <li><a href="{{ route('backend.story.index') }}">Story Posts</a></li>
          <li><a href="{{ route('backend.storyimages.index') }}">Story Images</a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><span class="navbar-text">Hello, {{ $admin->name }}</span></li>
         <li><a href="{{ route('auth.logout') }}">Logout</a></li>
       </ul>
     </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>@yield('title')</h3>
            @if($errors->any())
              <div class="alert alert-danger">
                <strong>We found some errors!</strong>
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            @if($status)
              <div class="alert alert-info">
                {{ $status }}
              </div>
            @endif
          </div>
        </div>

              @yield('content')

      </div>
            @include('layouts.footscripts')
  </body>
</html>
