@extends('admin.layouts.master')

@section('title', 'Story Images')

    @section('content')
        <a href="{{ route('admin.storyimages.create') }}" class="button">Create New Story Image</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Story Image ID</th>
                <th>Story Image Thumbnail</th>
                <th>Story Image Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($storyImages as $storyImage)
                <tr>
                    <td>
                        <a href="{{ route('admin.storyimages.show', $storyImage->id) }}">{{ $storyImage->id }}</a>
                    </td>
                    <td>
                        <img src="{{ $storyImage->getThumbnailImagePath().'?'. 'time='. time() }}">
                    </td>
                    <td>{{ $storyImage->image_name }}</td>
                    <td>
                        <a href="{{ route('admin.storyimages.edit', $storyImage->id) }}">
                                <i class="fi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.storyimages.confirm', $storyImage->id) }}">
                                <i class="fi-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $storyImages->render() !!}

    @endsection
