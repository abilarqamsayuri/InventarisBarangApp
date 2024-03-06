@extends('layouts.app')
@section('title','Form Edit User')
@section('content_header')
    <h1>Form Edit User</h1> 
@stop
@section('content')
@foreach($data as $rs)
<!-- Horizontal Form -->
<div class="container">
<div class="row justify-content-center">
<div class="col-md-15">
    <div class="card card-info">
        <div class="card-header">
                <h3 class="card-title">Form Edit User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('user.update',$rs->id)}}" method="POST">
                        @csrf
                        @method('put')
                    <div class="card-body">
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" value="{{ $rs->name }}">
                        </div>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" value="{{ $rs->email }}">
                        </div>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="password" value="{{ $rs->password }}">
                        </div>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                        <select class="form-control" name="role">
                            <option value="">{{ $rs->role }}</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Anggota">Anggota</option>
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
                    <button type="submit" class="btn btn-info" href="user" name="proses">Tambah</button>
                    <a type="submit"class="btn btn-default float-right" href="{{ url('/user')}}" name="unproses">Cancel</a>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- /.card -->
@endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
