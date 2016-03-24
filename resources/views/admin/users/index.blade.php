@extends('admin.layouts.master')

@section('title', 'Users')

    @section('content')
        <a href="{{ route('admin.users.create') }}" class="button">Create New User</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}">
                            <i class="fi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.users.confirm', $user->id) }}">
                                    <i class="fi-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $users->render() !!}

    @endsection
