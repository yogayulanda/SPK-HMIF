@extends('layout/master')

@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{(session('sukses'))}}
</div>
@endif
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit User</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/admin/{{$admin->id}}/update" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="example">Nama User</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Masukkan Nama" value="{{$admin->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="example">Email</label>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="Masukkan Email" value="{{$admin->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="example">Ubah Password</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Masukkan password baru">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/admin" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                    @endsection