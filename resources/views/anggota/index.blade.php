@extends('adminlte::page')
@section('title','Data Anggotta')
@section('content_header')
    <h1>Data Anggota</h1> 
@stop
@section('content')  {{-- Isi Konten Data Anggota --}}
    <p>Welcome to anggota data.</p>
    @php
        $ar_judul = ['No','NIP','Nama','Alamat','Email'];
        $no = 1;
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($ar_anggota as $agt)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $agt->nip }}</td>
                    <td>{{ $agt->nama }}</td>
                    <td>{{ $agt->alamat }}</td>
                    <td>{{ $agt->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop
