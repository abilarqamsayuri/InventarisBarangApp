@extends('layouts.app')
    @section('title','Data Inventaris')
    @section('content_header')
        <h1>Data Inventaris</h1> 
    @stop
    @section('content')  {{-- Isi Konten Data Inventaris --}}
    @if (Auth::user()->role == 'administrator')
        @php
        $ar_judul = ['No','Nama','Kategori','Jumlah','Harga','Kondisi','Action'];
            $no = 1;
        @endphp
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card card-info">
            <div class="card-header">
            <h3 class="card-title">Daftar Inventaris</h3>
            <a href="{{ url('inventariscsv') }}" class="btn btn-info float-right"><i class="fas fa-file-excel"></i> Unduh Excel </a>
            <a href="{{ url('inventarispdf') }}" class="btn btn-info float-right"><i class="fas fa-file-pdf"></i> Unduh PDF </a>
            <a class="btn btn-primary float-right" style="margin-right: 10px;" href="{{ route('inventaris.create') }}" role="button">Tambah Inventaris</a>
            </div>
                <!-- card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                @foreach($ar_judul as $jdl)
                                <th>{{ $jdl }}</th>
                                @endforeach
                            </tr>
                    </thead>
                    <tbody>
                            @foreach($ar_inv as $i)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $i->nama_barang }}</td>
                                    <td>{{ $i->kat }}</td>
                                    <td>{{ $i->jumlah }}</td>
                                    <td>{{ $i->harga }}</td>
                                    <td>{{ $i->kondisi }}</td>
                                    <td>
                                        <form method="POST" action="{{route ('inventaris.destroy',$i->id)}}">
                                            @csrf
                                            @method('delete')
                                            <a class="btn btn-info" 
                                            href="{{route ('inventaris.show',$i->id)}}">Detail</a>
                                            <a class="btn btn-success" 
                                            href="{{route ('inventaris.edit',$i->id)}}">Edit</a>
                                            <button class="btn btn-danger"
                                            onclick="return confirm('Anda Yakin Untuk Menghapus Data Ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
        @else
            @include ('accessDenied')
    @endif
    @stop
    @section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    @stop
    @section('js')
    <!-- <script> console.log('Hi!'); </script> -->
    <script>
    $(function() {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>
    <!-- jQuery -->
    <script src="{{ asset ('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset ('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset ('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset ('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset ('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset ('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ('dist/js/demo.js')}}"></script>
    @stop
