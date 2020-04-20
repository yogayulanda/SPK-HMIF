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
                            <h3 class="panel-title">Edit Data Kader</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/mahasiswa/{{$mahasiswa->id}}/update" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="example">Nama Kader</label>
                                    <input name="nama_mahasiswa" type="text" class="form-control" id="nama_mahasiswa"
                                        placeholder="Masukkan Nama" value="{{$mahasiswa->nama_mahasiswa}}">
                                </div>
                                <div class="form-group">
                                    <label for="example">Nim</label>
                                    <input name="nim" type="text" class="form-control" id="nim"
                                        placeholder="Masukkan NIM" value="{{$mahasiswa->nim}}">
                                </div>
                                <div class="form-group">
                                    <label for="example">Kelas</label>
                                    <input name="kelas" type="text" class="form-control" id="kelas"
                                        placeholder="Masukkan Kelas" value="{{$mahasiswa->kelas}}">
                                </div>
                                <div class="form-group">
                                    <label name='jenis_kelamin' for="exampleFormControlSelect">Jenis Kelamin</label
                                        value="{{$mahasiswa->jenis_kelamin}}">
                                    <select name='jenis_kelamin' class="custom-select">
                                        <option selected>Piih Jenis Kelamin</option>
                                        <option value="Laki-Laki" @if($mahasiswa->jenis_kelamin == 'Laki-Laki') selected
                                            @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if($mahasiswa->jenis_kelamin == 'Perempuan') selected
                                            @endif>Perempuan</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/mahasiswa" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                    @endsection