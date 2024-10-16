@extends('layout')
@section('title' , 'Email Verification')
@section('content')

<style>
    .form-section {
        margin-top: 50px;
    }
    .form-section h1 {
        text-align: center;
    }
    .form-section .error-message {
        color: red;
    }
    .center-box {
        max-width: 500px;
        margin: 0 auto;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .btn{
        margin-top: 10px;
        
    
    }
</style>

<div class="container form-section">
    <div class="center-box">
        <h1>Email Verification</h1>
        @if(session('error'))
            <div class="alert alert-danger error-message" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('send.otp') }}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send OTP</button>
        </form>
    </div>
</div>

@endsection