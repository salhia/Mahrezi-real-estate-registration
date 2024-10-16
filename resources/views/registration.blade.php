@extends('layouts.AdminLTE')
@section('title' , 'Registration')
@section('content')
@section('additional-css')
<style>
    .form-card {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-card .card-body {
        padding: 1.5rem;
    }
</style>
@endsection
@section('body')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>

    <div class="card form-card">
        <div class="card-body">
            <form action="{{route('registration.post')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Fullname</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
