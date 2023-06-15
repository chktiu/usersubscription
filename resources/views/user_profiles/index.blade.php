 
@extends('layouts.app')

@section('content')
    <h1>User Profiles</h1>

    @if (count($userProfiles) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userProfiles as $userProfile)
                    <tr>
                        <td>{{ $userProfile->id }}</td>
                        <td>{{ $userProfile->full_name }}</td>
                        <td>{{ $userProfile->email }}</td>
                        <td>
                            <a href="{{ route('user_profiles.show', $userProfile->id) }}">View</a>
                            <a href="{{ route('user_profiles.edit', $userProfile->id) }}">Edit</a>
                            <form action="{{ route('user_profiles.destroy', $userProfile->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No user profiles found.</p>
    @endif

    <a href="{{ route('user_profiles.create') }}">Create User Profile</a>
@endsection
