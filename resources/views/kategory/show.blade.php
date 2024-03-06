@extends('layouts.app')
@section('title', 'Detail Data Kategory')
@section('content_header')
<h1>Data Detail Kategory</h1>
@stop
@section('content')
    @foreach($s_kat as $k)
<div class="container">
<div class="row justify-content-center">
    <div class="media">
        <div class="media-body">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><u>{{  $k->nama }}</u></h3>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <p>
                                        Nama Kategory : {{ $k->nama }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    <a href="{{ url('/kategory')}}" class="btn btn-info">Go Back</a>
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