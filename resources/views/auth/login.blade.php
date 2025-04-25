@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection