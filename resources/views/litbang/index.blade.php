@extends('layout/master') {{-- Ambil Layout Dari Master  --}}
@section('litbang', 'active')
@section('content')

{{-- Fungsi Alert Jika Sukses --}}
@if(session('sukses'))
@endif

<!-- Tabel Kriteria -->
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Litbang</h3>
                            <p class="panel-subtitle">Kriteria Divisi Litbang</p>
                            @if (auth()->user()->role =='admin' || auth()->user()->role == 'litbang' )
                            <div class="text-right">
                                <a type="button" class="btn btn-input" data-toggle="modal" data-target="#exampleModal">
                                    Tambahkan Kriteria
                                </a>
                            </div>
                            @endif
                        </div>
                        {{-- Isi Tabel Kriteria --}}
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kriteria</th>
                                        <th>Bobot</th>
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'litbang' )
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($kriteria as $krt)
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{$krt->nama_kriteria}}</td>
                                        <td>{{$krt->bobot_kriteria}}</td>
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'litbang' )
                                        <td>
                                            <a href="/litbang/{{$krt->id}}/edit" class="btn btn-edit"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-delete delete" kriteria-id="{{$krt->id}}"
                                                nama-kriteria="{{$krt->nama_kriteria}}"><i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Input Kriteria -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- Isi Modal --}}
                    <div class="modal-body">
                        <form action="/litbang/create" method="POST">
                            {{csrf_field()}}
                            <div class="form-group {{$errors->has('nama_kriteria') ? 'has-error' : ''}}">
                                <label for="example">Nama Kriteria</label>
                                <input name="nama_kriteria" type="text" class="form-control" id="nama_mahasiswa"
                                    placeholder="Masukkan Nama Kriteria" value="{{old('nama_kriteria')}}">
                                {{-- Fungsi Validasi Inputan --}}
                                @if($errors->has('nama_kriteria'))
                                <span class="help-block">{{$errors->first('nama_kriteria')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('bobot_kriteria') ? 'has-error' : ''}}">
                                <label for="example">Bobot</label>
                                <input name="bobot_kriteria" type="text" class="form-control" id="nim"
                                    placeholder="Masukkan Bobot Kriteria" value="{{old('bobot_kriteria')}}">
                                {{-- Fungsi Validasi Inputan --}}
                                @if($errors->has('nama_kriteria'))
                                <span class="help-block">{{$errors->first('nama_kriteria')}}</span>
                                @endif
                            </div>
                    </div>
                    {{-- Footer Modal --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Mahasiswa -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Litbang</h3>
                            <p class="panel-subtitle">Nilai Litbang</p>
                            <div class="text-right">
                                <a href="/litbang/hitungutility" class="btn btn-tombol">Nilai Utility</a>
                                <a href="/litbang/smart" class="btn btn-delete">Perhitungan</a>
                            </div>
                        </div>
                        {{-- Isi Tabel Mahasiswa --}}
                        <div class="panel-body">
                            <table class="table table-hover" id="data">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        @foreach($kriteria as $krt)
                                        <th>{{$krt->nama_kriteria}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_mahasiswa as $p)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $p->nama_mahasiswa }}</td>
                                        @foreach($p->KriteriaLitbang->sortBy('id'); as $n)
                                        <td>{{$n->pivot->nilai}}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

{{-- Sweet Alert Delete --}}
@section('footer')
<script>
    $(document).ready(function(){   //Semua Fungsi diatas dijalankan apabila document/ halaman sudah ready semua
    
// Sweet ALert Delete
    $('.delete').click (function(){
        var kriteria_id = $(this).attr('kriteria-id');
        var nama_kriteria = $(this).attr('nama-kriteria');
        swal({
title: "Are you sure?",
    text: "Delete " + nama_kriteria,
    icon: "warning",
    buttons: true,
    dangerMode: true,
})
.then((willDelete) => {
    console.log(willDelete);
        if (willDelete) {
            window.location = "/litbang/"+kriteria_id+"/delete"
        } 
});
});
    $('#data').DataTable();         // Deklarasi Data Table

});
</script>
@endsection