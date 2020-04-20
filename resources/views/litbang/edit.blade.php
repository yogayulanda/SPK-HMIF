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
                            <h3 class="panel-title">Kriteria Litbang</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/litbang/{{$kriteria_litbang->id}}/update" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="example">Nama Kriteria</label>
                                    <input name="nama_kriteria" type="text" class="form-control" id="nama_mahasiswa"
                                        placeholder="Masukkan Nama" value="{{$kriteria_litbang->nama_kriteria}}">
                                </div>
                                <div class="form-group">
                                    <label for="example">Label Kriteria</label>
                                    <input name="bobot_kriteria" type="text" class="form-control" id="nim"
                                        placeholder="Masukkan Bobot Kriteria"
                                        value="{{$kriteria_litbang->bobot_kriteria}}">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/litbang" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                    @endsection