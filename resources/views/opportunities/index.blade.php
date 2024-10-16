@extends('layouts.AdminLTE')
@section('title',"ادخال استثمار")
@section('additional-css')
 <!----------datatabel------------------------------->
   <link rel="stylesheet" href="{{asset('/')}}plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}dist/css/adminlte.min.css">
 <!----------datatabel------------------------------->

 @section('additional-css')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

@endsection


@section('body')
<div class="content-wrapper">
    <div class="container-fluid">
        <h1>صفحة الاستثمار</h1>



@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif



        <table id="example1" class="table table-bordered table-striped" dir="rtl">
            <thead>
                <tr>
                    <th>#</th>
                    <th>رقم الفرصة</th>
                    <th>اسم الباحث</th>
                    <th>المنطقة</th>
                    <th>رقم الهاتف</th>
                    <th>تفاصيل المبني</th>
                    <th>تفاصيل التواصل</th>
                    <th>صورة المبني</th>
                    <th>الموقع</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($opportunities as $opportunity)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $opportunity->opportunity_number }}</td>
                        <td>{{ $opportunity->researcher_name }}</td>
                        <td>{{ $opportunity->region }}</td>
                        <td>{{ $opportunity->phone_number }}</td>
                        <td>{{ $opportunity->building_details }}</td>
                        <td>{{ $opportunity->contact_details }}</td>
                        <td>
                            <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                @if($opportunity->building_image)
                                    <a href="{{ asset('storage/' . $opportunity->building_image) }}" data-toggle="lightbox" data-title="sample 3 - red">
                                        <img src="{{ asset('storage/' . $opportunity->building_image) }}" alt="Building Image" width="100">
                                    </a>
                                @endif
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-info show-location" data-lat="{{ $opportunity->latitude }}" data-lng="{{ $opportunity->longitude }}">

                                 <i class="fas fa-map-marker-alt">map</i> <!-- Font Awesome map icon -->
                            </button>



                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Map Section -->
    <div id="map" style="height: 400px; width: 100%;"></div>
</div>
@endsection
@section('additional-scripts')
  <!-- DataTables  & Plugins -->
<script src="{{asset('/')}}plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('/')}}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/')}}plugins/jszip/jszip.min.js"></script>
<script src="{{asset('/')}}plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/')}}plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->

 <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


<!-- AdminLTE for demo purposes -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });

  });


document.addEventListener('DOMContentLoaded', function () {
    // Initialize the map
    const map = L.map('map').setView([0, 0], 2); // Default view

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Show location on button click
    document.querySelectorAll('.show-location').forEach(button => {
        button.addEventListener('click', function () {
            const latitude = parseFloat(this.getAttribute('data-lat'));
            const longitude = parseFloat(this.getAttribute('data-lng'));

            if (!isNaN(latitude) && !isNaN(longitude)) {
                // Set map view to the provided coordinates
                map.setView([latitude, longitude], 15);

                // Add a marker at the location
                L.marker([latitude, longitude]).addTo(map)
                    .bindPopup('Location: (' + latitude + ', ' + longitude + ')')
                    .openPopup();
            } else {
                alert('Invalid latitude or longitude values.');
            }
        });
    });
});
</script>
@endsection

