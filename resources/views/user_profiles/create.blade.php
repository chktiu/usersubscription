 
@extends('layouts.app')

@section('content')
    <h1>Create User Profile</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user_profiles.store') }}" method="POST">
        @csrf
        <div>
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
        </div>
        <div>
            <label for="address">Address</label>
            <textarea name="address" id="address">{{ old('address') }}</textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
