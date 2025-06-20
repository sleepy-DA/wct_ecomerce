@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control mb-2">
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control mb-2">
        <input type="text" name="address" value="{{ old('address', $user->address ?? '') }}" class="form-control mb-2">

        <button class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
