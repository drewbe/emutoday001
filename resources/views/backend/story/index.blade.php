@extends('layouts.backend')

@section('title', 'Story')

@section('content')
    <a href="{{ route('backend.story.create') }}" class="button">Create New Story</a>

    <table class="hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Author</th>
                <th>Published</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($storys as $story)
                <tr class="{{ $story->published_highlight }}">
                    <td>
                        <a href="{{ route('backend.story.edit', $story->id) }}">{{ $story->title }}</a>
                    </td>
                    <td>{{ $story->slug }}</td>
                    <td>{{ $story->author->name }}</td>
                    <td>{{ $story->published_date }}</td>
                    <td>
                        <a href="{{ route('backend.story.edit', $story->id) }}">
                            <i class="fi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('backend.story.confirm', $story->id) }}">
                            <i class="fi-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $storys->render() !!}
@endsection
