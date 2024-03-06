@extends('layouts.app')
@section('title', 'Detail Data Gedung')
@section('content_header')
<h1>Data Detail Gedung</h1>
@stop
@section('content')
    @foreach($s_gedung as $g)
<div class="container">
<div class="row justify-content-center">
    <div class="media">
        <div class="media-body">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><u>{{  $g->nama }}</u></h3>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <p>
                                        Nama Gedung : {{ $g->nama }}
                                        </br>Jumlah Gedung : {{ $g->jumlah }} 
                                        </br>Inventaris : {{ $g->inventaris }}
                                        </br>Kategori Inventaris : {{ $g->kategori }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    <a href="{{ url('/gedung')}}" class="btn btn-info">Go Back</a>
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