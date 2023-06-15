 
@extends('layouts.app')

@section('content')
    <h1>User Profile</h1>

    <div>
        <strong>ID:</strong> {{ $userProfile->id }}
    </div>
    <div>
        <strong>Full Name:</strong> {{ $userProfile->full_name }}
    </div>
    <div>
        <strong>Email:</strong> {{ $userProfile->email }}
    </div>
    <div>
        <strong>Phone:</strong> {{ $userProfile->phone }}
    </div>
    <div>
        <strong>Address:</strong> {{ $userProfile->address }}
    </div>

    <a href="{{ route('user_profiles.edit', $userProfile->id) }}">Edit</a>

    <form action="{{ route('user_profiles.destroy', $userProfile->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
