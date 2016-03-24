@extends('layouts.masters')
@section('content')
  <div class="row">
    <h6> Main with 2 masters</h6>
  </div>


@endsection

@section('footer')
  @parent
  <div class="row">
      <h5>Footer</h5>
  </div>

  @endsection
