 
@extends('layouts.app')

@section('content')
    <h1>Edit User Profile</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user_profiles.update', $userProfile->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" value="{{ $userProfile->full_name }}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $userProfile->email }}">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ $userProfile->phone }}">
        </div>
        <div>
            <label for="address">Address</label>
            <textarea name="address" id="address">{{ $userProfile->address }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
