@extends('layouts.app')
@section('title','Form Gedung')
@section('content_header')
    <h1>Form Gedung</h1> 
@stop
@section('content')
@php
    $rs1 = App\Models\Inventaris::all();
    $rs2 = App\Models\Kategory::all();
@endphp
<!-- Horizontal Form -->
<div class="container">
<div class="row justify-content-center">
<div class="col-md-15">
    <div class="card card-info">
        <div class="card-header">
                <h3 class="card-title">Gedung Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('gedung.store')}}" method="POST">
                        @csrf
                    <div class="card-body">
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nama" placeholder="nama">
                        </div>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                                <input type="number" class="form-control" name="jumlah" placeholder="jumlah gedung">
                        </div>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Invantaris</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <select class="form-control" name="inventaris">
                                <option value="">-- Pilih Inventaris --</option>
                                @foreach($rs1 as $i)
                                <option value="{{ $i->id }}">{{ $i->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <select class="form-control" name="kategori">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($rs2 as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- ini adalah validasi form -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif
                   
                    </div>
                    <button type="submit" class="btn btn-info" href="gedung" name="proses">Tambah</button>
                    <a type="submit"class="btn btn-default float-right" href="{{ url('/gedung')}}" name="unproses">Cancel</a>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- /.card -->

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
