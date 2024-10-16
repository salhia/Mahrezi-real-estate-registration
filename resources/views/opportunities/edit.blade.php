@extends('layouts.AdminLTE')
@section('title',"ادخال استثمار")
@section('additional-css')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

@endsection
@section('body')
<div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
<div class="container">

    <h1>تعديل صفحة الاستثمار </h1>

    <form action="{{ route('opportunities.update',$opportunity) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="opportunity_number">رقم الفرصة:</label>
            <input type="text" name="opportunity_number" value="{{ $opportunity->opportunity_number }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="researcher_name">اسم الباحث:</label>
            <input type="text" name="researcher_name" value="{{ $opportunity->researcher_name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="region">المنطقة:</label>
            <input type="text" name="region" value="{{ $opportunity->region }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_number">رقم الهاتف:</label>
            <input type="text" name="phone_number" value="{{ $opportunity->phone_number }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="building_details">تفاصيل المبني:</label>
            <textarea name="building_details" class="form-control" required>{{ $opportunity->building_details }}</textarea>
        </div>
        <div class="form-group">
            <label for="contact_details">تفاصيل التواصل:</label>
            <textarea name="contact_details" class="form-control" required>{{ $opportunity->contact_details }}</textarea>
        </div>
        <div class="form-group">
            <label for="location">الموقع:</label>
            <input type="text" name="location" value="{{ $opportunity->location }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="building_image">صورة المبني:</label>
            <input type="file" name="building_image" class="form-control">
            @if($opportunity->building_image)
                <img src="{{ asset('storage/' . $opportunity->building_image) }}" alt="Building Image" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</div>
</div>
@endsection
