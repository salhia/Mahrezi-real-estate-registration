@extends('layout')
@section('title' , 'Email Verification')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Email</title>
</head>
<body>
    <p>Your OTP is: <strong>{{ $otp }}</strong></p>

@endsection