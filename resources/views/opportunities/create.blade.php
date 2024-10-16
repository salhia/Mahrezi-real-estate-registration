@extends('layouts.AdminLTE')
@section('title',"ادخال استثمار")
@section('additional-css')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
@section('content')

@section('body')
<div class="content-wrapper">

      <div class="container-fluid">

<div class="card form-card card-primary" dir="rtl">

              <div class=" card-header tex-right " >
                <h3 class=" text-right ">ادخال بيانات الاستثمار</h3>
              </div>
    <form action="{{ route('opportunities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group  text-right">
            <label for="opportunity_number">رقم الفرصة:</label>

            <input type="text"  name="opportunity_number" class="form-control" required>
        </div>
        <div class="form-group  text-right">
            <label for="researcher_name">اسم الباحث:</label>
            <input type="text"  value="{{auth()->user()->name}}" name="researcher_name" class="form-control"readonly >
        </div>
        <div class="form-group  text-right">
            <label for="region">المنطقة:</label>
            <input type="text" name="region" class="form-control" required>
        </div>
        <div class="form-group  text-right">
            <label for="phone_number">رقم الهاتف:</label>
            <input type="text" name="phone_number" class="form-control" required>
        </div>
        <div class="form-group  text-right">
            <label for="building_details">تفاصيل المبني:</label>
            <textarea name="building_details" class="form-control" required></textarea>
        </div>
        <div class="form-group  text-right">
            <label for="contact_details">تفاصيل التواصل:</label>
            <textarea name="contact_details" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="location">الموقع:</label>
            <input type=""class="form-control" name="location" id="location" value="">
            <input type=""class="form-control" name="latitude" id="latitude" value="">
            <input type=""class="form-control" name="longitude" id="longitude" value="">
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>
        <div class="form-group  text-right">
            <label for="building_image">صورة المبني:</label>
            <input type="file" name="building_image" class="form-control">
        </div>
         <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
          </div>
    </form>
      </div>
</div>
</div>

@endsection

@section('additional-scripts')
 <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
     $(document).ready(function() {
        // Initialize the map
        var map = L.map('map').setView([23.5859, 58.4059], 13); // Default coordinates for fallback

        // Add a tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Function to update inputs with marker position
        function updateInputs(marker) {
            var position = marker.getLatLng();
            document.getElementById('latitude').value = position.lat;
            document.getElementById('longitude').value = position.lng;
            document.getElementById('location').value = position.lat + ',' + position.lng; // Optional
        }

        // Attempt to get the user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLat = position.coords.latitude;
                var userLng = position.coords.longitude;

                // Set the map view to the user's location
                map.setView([userLat, userLng], 13);

                // Add a draggable marker at the user's location
                var marker = L.marker([userLat, userLng], { draggable: true }).addTo(map);

                // Update inputs when the marker is moved
                marker.on('dragend', function() {
                    updateInputs(marker);
                });

                // Initialize inputs for the marker
                updateInputs(marker);
            }, function() {
                // Handle error (e.g., user denied permission)
                alert("Unable to retrieve your location.");
            });
        } else {
            // Geolocation is not supported
            alert("Geolocation is not supported by this browser.");
        }

        // Allow the user to click on the map to place or move the marker
        map.on('click', function(e) {
            // Remove the old marker if it exists
            if (typeof marker !== 'undefined') {
                map.removeLayer(marker);
            }

            // Create a new marker at the clicked location
            marker = L.marker(e.latlng, { draggable: true }).addTo(map);

            // Update inputs for the new marker
            marker.on('dragend', function() {
                updateInputs(marker);
            });
            updateInputs(marker); // Initialize inputs for newly placed marker
        });
    });
</script>
@endsection
