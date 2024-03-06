@extends('layouts.app')
    @section('title','Data Gedung')
    @section('content_header')
        <h1>Data Gedung</h1> 
    @stop
    @section('content')  {{-- Isi Konten Data Gedung --}}
        @php
        $ar_judul = ['No','Nama','Jumlah','Inventaris','Kategori','Action'];
            $no = 1;
        @endphp
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card card-info">
            <div class="card-header">
            <h3 class="card-title">Daftar Gedung</h3>
            <a href="{{ url('gedungcsv') }}" class="btn btn-info float-right"><i class="fas fa-file-excel"></i> Unduh Excel </a>
            <a href="{{ url('gedungpdf') }}" class="btn btn-info float-right"><i class="fas fa-file-pdf"></i> Unduh PDF </a>
            @if (Auth::user()->role == 'administrator')
            <a class="btn btn-primary float-right" style="margin-right: 10px;" href="{{ route('gedung.create') }}" role="button">Tambah Gedung</a>
            @endif
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
                            @foreach($ar_gedung as $g)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $g->nama }}</td>
                                    <td>{{ $g->jumlah }}</td>
                                    <td>{{ $g->inventaris}}</td>
                                    <td>{{ $g->kategori }}</td>
                                    <td>
                                        <form method="POST" action="{{route ('gedung.destroy',$g->id)}}">
                                            @csrf
                                            @method('delete')
                                            <a class="btn btn-info" 
                                            href="{{route ('gedung.show',$g->id)}}">Detail</a>
                                            <a class="btn btn-success" 
                                            href="{{route ('gedung.edit',$g->id)}}">Edit</a>
                                            @if (Auth::user()->role == 'administrator')
                                            <button class="btn btn-danger"
                                            onclick="return confirm('Anda Yakin Untuk Menghapus Data Ini?')">Hapus</button>
                                            @endif
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
