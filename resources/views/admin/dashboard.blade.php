@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
        <div class="medium-6 columns">
            <ul class="list-group">
                @foreach($storys as $story)
                    <li class="list-group-item">
                        <h4> <a href="#">{{ $story->title }}</a>
                            <a href="{{ route('admin.story.edit', $story->id) }}" class="pull-right">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </h4>

                        {!! $story->excerpt_html !!}

                    </li>
                @endforeach
            </ul>
        </div>
        <div class="medium-6 columns">
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">
                        <h4> {{ $user->name }} </h4>

                        last Login {{ $user->last_login_difference }}
                    </li>
                @endforeach
            </ul>
        </div>
@endsection
