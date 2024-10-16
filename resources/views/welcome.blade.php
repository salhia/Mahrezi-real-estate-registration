@extends('layouts.AdminLTE')
@section('title',"Home Page")
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
@endsection
@section('content')
@section('body')
<div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

      <!-- Main content -->
      <div class="col-md-12 main-content">
        <h1 class="text-center">نظرة عامة</h1>
        <div class="row">
          <!-- Cards -->
          <div class="col-md-4">
            <div class="card bg-primary text-white">
              <div class="card-body">
                <h5 class="card-title">عدد الملفات</h5>
                <p class="card-text">10,000</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-success text-white">
              <div class="card-body">
                <h5 class="card-title">عدد الملفات المدخلة خلال اليوم</h5>
                <p class="card-text">$50,000</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-danger text-white">
              <div class="card-body">
                <h5 class="card-title">عدد الملفات المدخلة خلال الشهر</h5>
                <p class="card-text">500</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Table -->

        <div class="table-responsive">

           <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">رقم الفرصة</th>
                <th scope="col">اسم الباحث</th>
                <th scope="col">المنطقة</th>
                <th scope="col">رقم الهاتف</th>
                <th scope="col">تفاصيل المبني </th>
                 <th scope="col">تفاصيل التواصل </th>
                <th scope="col">الموقع</th>
                <th scope="col">صورة المبني</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>123-456-7890</td>
                <td>Active</td>
                <td>تفاصيل المبني</td>
                <td>99878767</td>
                <td>3454545456</td>
                <td>photo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jane Doe</td>
                <td>jane@example.com</td>
                <td>987-654-3210</td>
                <td>Inactive</td>
                 <td>تفاصيل المبني</td>
                <td>99878767</td>
                <td>3454545456</td>
                <td>photo</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Bob Smith</td>
                <td>bob@example.com</td>
                <td>456-789-1230</td>
                <td>Active</td>
                 <td>تفاصيل المبني</td>
                <td>99878767</td>
                <td>3454545456</td>
                <td>photo</td>
              </tr>
                 <tr>
                <th scope="row">4</th>
                <td>Bob Smith</td>
                <td>bob@example.com</td>
                <td>456-789-1230</td>s
                <td>Active</td>
                 <td>تفاصيل المبني</td>
                <td>99878767</td>
                <td>3454545456</td>
                <td>photo</td>
              </tr>





              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
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
  });
</script>

@endsection

