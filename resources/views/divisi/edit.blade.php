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
                            <h3 class="panel-title">Edit Divisi</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/divisi/{{$divisi->id}}/update" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="example">Nama Divisi</label>
                                    <input name="nama_divisi" type="text" class="form-control" id="nama_divisi"
                                        placeholder="Masukkan Nama Divisi" value="{{$divisi->nama_divisi}}">
                                </div>
                                <div class="form-group">
                                    <label for="example">Kepala Divisi</label>
                                    <input name="kepala_divisi" type="text" class="form-control" id="kepala_divisi"
                                        placeholder="Nama Kepala Divisi" value="{{$divisi->kepala_divisi}}">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/divisi" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                    @endsection