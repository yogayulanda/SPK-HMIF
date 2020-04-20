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
                            <h3 class="panel-title">Kriteria Humas</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/humas/{{$kriteria_Humas->id}}/update" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="example">Nama Kriteria</label>
                                    <input name="nama_kriteria" type="text" class="form-control" id="nama_mahasiswa"
                                        placeholder="Masukkan Nama" value="{{$kriteria_Humas->nama_kriteria}}">
                                </div>
                                <div class="form-group">
                                    <label for="example">Label Kriteria</label>
                                    <input name="bobot_kriteria" type="text" class="form-control" id="nim"
                                        placeholder="Masukkan Bobot Kriteria"
                                        value="{{$kriteria_Humas->bobot_kriteria}}">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/humas" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                    @endsection