@extends('layout')
@section('title' , 'Email Varification')
@section('content')


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">OTP Verification</h3>
        </div>
        <div class="card-body">
          <form id="otpForm">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <a href="/otpverification"><button type="button" class="btn btn-primary" onclick="sendOTP()">Send OTP</button></a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>







@endsection