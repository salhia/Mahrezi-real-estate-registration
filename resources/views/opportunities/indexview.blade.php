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
@endsection
@section('content')

@section('body')
<div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
     <h1>صفحة الاستثمار</h1>
     <a href="{{ route('opportunities.create') }}" class="btn btn-primary">ادخال جديد  </a>

     @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
     @endif

     <table  id="example1" class="table table-bordered table-striped" dir="rtl">
        <thead>
            <tr>
                <th>#</th>
                <th>رقم الفرصة</th>
                <th>اسم الباحث</th>
                <th>المنطقة</th>
                <th>رقم الهاتف</th>
                <th>تفاصيل المبني</th>
                <th>تفاصيل التواصل</th>
                <th>الموقع</th>
                <th>صورة المبني</th>
                <th>Actions</th>
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
                    <td>{{ $opportunity->location }}</td>
                    <td>
                        @if($opportunity->building_image)
                            <img src="{{ asset('storage/' . $opportunity->building_image) }}" alt="Building Image" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('opportunities.edit', $opportunity) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('opportunities.destroy', $opportunity) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
     </table>
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

