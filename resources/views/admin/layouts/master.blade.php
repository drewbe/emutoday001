<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')  &mdash; EMU</title>
    @section('style')
          @include('admin.layouts.styles')
    @show
    @section('scripthead')
          @include('admin.layouts.scriptshead')
    @show

  </head>

  <body>
  <div class="top-bar" id="dash-menu">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
          <li class="menu-text">EMU TODAY</li>
          <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('admin.users.index') }}">Users</a></li>
          <li><a href="{{ route('admin.story.index') }}">Story Posts</a></li>
          <li><a href="{{ route('admin.storyimages.index') }}">Story Images</a></li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <li><span class="navbar-text">Hello, {{ $admin->name }}</span></li>
          <li><a href="{{ route('auth.logout') }}">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
          <h3>@yield('title')</h3>
          @include('flash::message')
          @include('admin/partials.errors')
          @yield('content')
          </div>
      </div>
      @section('footer')
        @include('admin.layouts.scriptsfooter')
      @show
  </body>
</html>
