@extends('layouts.AdminLTE')
@section('title' , 'Change Password')
@section('content')
@section('additional-css')
<style>
    .form-group {
        padding: 10px;
    }
    .card {
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .card-body {
        padding: 1.5rem;
    }
</style>
@endsection
@section('content')
@section('body')
<div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-md-12 main-content">
    @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <div class="card">
        <div class="card-header ">{{ __('تغيير كلمة المرور') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('change.password') }}">
                @csrf

                <!-- Rest of your form fields -->
                <div class="form-group row">

                                <div class="col-md-6">
                                    <input placeholder="كلمة المرور الحالية" id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">

                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input placeholder="كلمة المرور الجديدة" id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new_password">

                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input placeholder="اعادة كلمة المرور الجديدة" id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new_password_confirmation">
                                </div>
                            </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('تغيير كلمة المرور') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
 </div>
    </div>
</div>
</div>
@endsection












