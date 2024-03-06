@extends('layouts.app')
@section('title', 'Detail Data User')
@section('content_header')
<h1>Data Detail User</h1>
@stop
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="media">
        <div class="media-body">
            <div class="card card-info">
                <div class="card-header">
                <div class="card-body">
                    <h3 class="card-title"><u>{{ Auth::user()->name }}</u></h3>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <p>
                                        Nama User : {{ Auth::user()->name }}
                                        </br> Email User : {{ Auth::user()->email }}
                                        </br> Role User : {{ Auth::user()->role }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    <a href="{{ url('/home')}}" class="btn btn-info">Go Back</a>
                    </br>
                    </br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop