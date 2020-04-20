@extends('layout/master')
@section('admin', 'active')

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

                            <h3 class="panel-title">Users</h3>
                            <p class="panel-subtitle">Halaman User</p>
                            <div class="right">
                                <a type="button" class="btn btn-input" data-toggle="modal" data-target="#exampleModal">
                                    Tambah User
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($admin as $admin)
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->role}}</td>
                                        <td>
                                            <a href="/admin/{{$admin->id}}/edit" class="btn btn-edit btn-sm"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-sm btn-delete delete" admin-id="{{$admin->id}}"
                                                nama-admin="{{$admin->name}}"><i class="fa fa-trash"></i>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="role">Pilih Role : </label>
                        <select class="form-control" id="role" name="role">
                            <option selected value="admin">Admin</option>
                            <option value="ketua">Ketua</option>
                            <option value="sekretaris">Sekretaris</option>
                            <option value="aspirasi">Pengurus Aspirasi</option>
                            <option value="litbang">Pengurus Litbang</option>
                            <option value="humas">Pengurus Humas</option>
                            <option value="keorganisasian">Pengurus Keorganisasian</option>
                        </select>
                    </div>
                    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                        <label for="example">Nama Lengkap</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan Nama"
                            value="{{old('name')}}">
                        @if($errors->has('name'))
                        <span class="help-block">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label for="example">Email</label>
                        <input name="email" type="text" class="form-control" id="nim" placeholder="Masukkan Email"
                            value="{{old('email')}}">
                        @if($errors->has('email'))
                        <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                        <label for="example">Password</label>
                        <input name="password" type="password" class="form-control" id="nim"
                            placeholder="Masukkan Password" value="{{old('password')}}">
                        @if($errors->has('password'))
                        <span class="help-block">{{$errors->first('password')}}</span>
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
        var admin_id = $(this).attr('admin-id');
        var name = $(this).attr('nama-admin');
        swal({
  title: "Are you sure?",
  text: "Delete " + name,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
    console.log(willDelete);
        if (willDelete) {
            window.location = "/admin/"+admin_id+"/delete"
        } 
});
    });
</script>
@endsection