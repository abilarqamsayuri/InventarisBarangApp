@extends('layouts.app')
@section('title', 'Detail Data Inventaris')
@section('content_header')
<h1>Data Detail Inventaris</h1>
@stop
@section('content')
    @foreach($s_inv as $i)
<div class="container">
<div class="row justify-content-center">
    <div class="media">
        <div class="media-body">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><u>{{  $i->nama_barang }}</u></h3>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <p>
                                        Nama Inventaris : {{ $i->nama_barang }}
                                        </br>Kategori Inventaris : {{ $i->kat }}
                                        </br>Jumlah Inventaris : {{ $i->jumlah }} 
                                        </br>Harga Inventaris : {{ $i->harga }}
                                        </br>Kondisi Inventaris : {{ $i->kondisi }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    <a href="{{ url('/inventaris')}}" class="btn btn-info">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    @endforeach
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop