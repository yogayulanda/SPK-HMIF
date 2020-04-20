@extends('layout/master')
@section('mahasiswa', 'active')
@section('content')
@if(session('sukses'))
@endif

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mahasiswa</h3>
                            <p class="panel-subtitle">Data Kader HMIF</p>
                            <!-- Modal Tambah Mahasiswa -->
                            <div class="text-right">
                                <a href="mahasiswa/export/" class="btn btn-tombol margin-bottom-10"> Export <i
                                        class="fa fa-download"></i></a>
                                @if (auth()->user()->role =='admin' || auth()->user()->role == 'sekretaris' )
                                <a type="button" class="btn btn-input margin-bottom-10" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Tambah Data Mahasiswa
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table" id="datamahasiswa">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nim</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_mahasiswa as $mahasiswa)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$mahasiswa->nama_mahasiswa}}</td>
                                        <td>{{$mahasiswa->nim}}</td>
                                        <td>{{$mahasiswa->kelas}}</td>
                                        <td>{{$mahasiswa->jenis_kelamin}}</td>
                                        <td class="tombol text-center ">
                                            <a href="/mahasiswa/{{$mahasiswa->id}}/profile"
                                                class="btn btn-tombol btn-tombol"><i class="fa fa-plus"></i></a>
                                            @if (auth()->user()->role =='admin' || auth()->user()->role == 'sekretaris'
                                            )
                                            <a href="/mahasiswa/{{$mahasiswa->id}}/edit" class="btn btn-edit"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-delete delete" mahasiswa-id="{{$mahasiswa->id}}"
                                                nama-mahasiswa="{{$mahasiswa->nama_mahasiswa}}"><i
                                                    class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <strong class="modal-title" id="exampleModalLabel">Tambah Data Kader</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/mahasiswa/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('nama_mahasiswa') ? 'has-error' : ''}}">
                        <label for="example">Nama Mahasiswa</label>
                        <input name="nama_mahasiswa" type="text" class="form-control" id="nama_mahasiswa"
                            placeholder="Nama Lengkap" value="{{old('nama_mahasiswa')}}">
                        @if($errors->has('nama_mahasiswa'))
                        <span class="help-block">{{$errors->first('nama_mahasiswa')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('nim') ? 'has-error' : ''}}">
                        <label for="example">Nim</label>
                        <input name="nim" type="text" class="form-control" id="nim"
                            placeholder="NIM (contoh : 16.11.0711)" value="{{old('nim')}}">
                        @if($errors->has('nama_mahasiswa'))
                        <span class="help-block">{{$errors->first('nim')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('kelas') ? 'has-error' : ''}}">
                        <label for="example">Kelas</label>
                        <input name="kelas" type="text" class="form-control" id="kelas"
                            placeholder="KELAS (contoh : 16 IF 01)" value="{{old('kelas')}}">
                        @if($errors->has('kelas'))
                        <span class="help-block">{{$errors->first('kelas')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                        <label name='jenis_kelamin' for="exampleFormControlSelect">Jenis Kelamin</label>
                        <select name='jenis_kelamin' class="custom-select">
                            <option selected value="Laki-Laki"
                                {{(old('jenis_kelamin') == 'Laki-Laki') ? ' selected' : ''}}>Laki-Laki</option>
                            <option value="Perempuan" {{(old('jenis_kelamin') == 'Perempuan') ? ' selected' : ''}}>
                                Perempuan</option>
                        </select>
                        @if($errors->has('jenis_kelamin'))
                        <span class="help-block">{{$errors->first('nama_mahasiswa')}}</span>
                        @endif
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
<script>
    $(document).ready(function(){   //Semua Fungsi diatas dijalankan apabila document/ halaman sudah ready semua
          // Deklarasi Data Table

    // Sweet Alert
    $('.delete').click (function(){
        var mahasiswa_id = $(this).attr('mahasiswa-id');
        var nama_mahasiswa = $(this).attr('nama-mahasiswa');
        swal({
  title: "Are you sure?",
  text: "Delete " + nama_mahasiswa,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
    console.log(willDelete);
        if (willDelete) {
            window.location = "/mahasiswa/"+mahasiswa_id+"/delete"
        } 
});
});
$('#datamahasiswa').DataTable( {
    } );
});

</script>

@endsection