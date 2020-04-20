@extends('layout/master')
@section('divisi', 'active')
@section('content')
@if(session('sukses'))
@endif
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Divisi</h3>
                            <p class="panel-subtitle">Data Divisi HMIF</p>
                            @if (auth()->user()->role =='admin' || auth()->user()->role == 'sekretaris' )
                            <div class="text-right">
                                <a type="button" class="btn btn-input" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Divisi
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kepala Divisi</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($divisi as $divisi)
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{$divisi->nama_divisi}}</td>
                                        <td>{{$divisi->kepala_divisi}}</td>
                                        <td>
                                            <a href="/divisi/{{$divisi->id}}/edit" class="btn btn-edit"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-delete delete" divisi-id="{{$divisi->id}}"
                                                nama-divisi="{{$divisi->nama_divisi}}"><i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/divisi/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('nama_divisi') ? 'has-error' : ''}}">
                        <label for="example">Nama Divisi</label>
                        <input name="nama_divisi" type="text" class="form-control" id="nama_divisi"
                            placeholder="Masukkan Nama" value="{{old('nama_divisi')}}">
                        @if($errors->has('nama_divisi'))
                        <span class="help-block">{{$errors->first('nama_divisi')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('kepala_divisi') ? 'has-error' : ''}}">
                        <label for="example">Nama Kepala Divisi</label>
                        <input name="kepala_divisi" type="text" class="form-control" id="nim"
                            placeholder="Masukkan Nama" value="{{old('kepala_divisi')}}">
                        @if($errors->has('kepala_divisi'))
                        <span class="help-block">{{$errors->first('kepala_divisi')}}</span>
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
    $('.delete').click (function(){
        var divisi_id = $(this).attr('divisi-id');
        var nama_divisi = $(this).attr('nama-divisi');
        swal({
  title: "Are you sure?",
  text: "Delete " + nama_divisi,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
    console.log(willDelete);
        if (willDelete) {
            window.location = "/divisi/"+divisi_id+"/delete"
        } 
});
    });
</script>
@endsection