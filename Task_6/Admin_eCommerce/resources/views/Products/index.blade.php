@extends('Layouts.Main')

@section('title','All Products')

@section('links')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Theme style -->
@endsection

@section('content')

<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name En</th>
            <th>Name Ar</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
            <th>Code</th>
            <th>Creat Date</th>
            <th>Update Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )

        <tr>
            <td >{{$product->id}}</td>
            <td >{{$product->name_en}}</td>
            <td >{{$product->name_ar}}</td>
            <td >{{$product->quantity}}</td>
            <td >{{$product->price}}</td>
            <td >{{$product->status}}</td>
            <td >{{$product->code}}</td>
            <td >{{$product->created_at}}</td>
            <td >{{$product->updated_at}}</td>
            <td>
                <a class="btn btn-primary" href="" >Edit</a>
                <a class="btn btn-primary" href="" >Delete</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
      $("#data_table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
  </script>
@endsection


