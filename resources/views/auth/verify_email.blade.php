@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Email Verification</h2>

    <form method="POST" action="{{ route('verification.verify') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ $userId }}">
        <div class="form-group">
            <label for="verification_code">Enter Verification Code</label>
            <input type="text" class="form-control" id="verification_code" name="verification_code" required>
            @error('verification_code')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>
@endsection