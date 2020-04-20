@extends('layout/master')
@section('header')
@stop
@section('content')
@if(session('sukses'))
@endif
<div class="main">
    <div class="main-content">
        <div class="panel-heading">
            <h3 class="panel-title">Profile Kader</h3>
        </div>

        <div class="panel panel-profile">
            <div class="clearfix">
                <!-- LEFT COLUMN -->
                <div class="profile-left">
                    <!-- PROFILE HEADER -->
                    <div class="profile-header">
                        <div class="overlay"></div>
                        <div class="profile-main">
                            <!-- <img src="assets/img/user-medium.png" class="img-circle" alt="Avatar"> -->
                            <h3 class="name">{{$mahasiswa->nama_mahasiswa}}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>

                    </div>
                    <!-- END PROFILE HEADER -->
                    <!-- PROFILE DETAIL -->
                    <div class="profile-detail">
                        <div class="profile-info">
                            <h4 class="heading">Data Kader</h4>
                            <ul class="list-unstyled list-justify">
                                <li> Nim <span>{{$mahasiswa->nim}}</span></li>
                                <li> Kelas <span>{{$mahasiswa->kelas}}</span></li>
                                <li>Jenis Kelamin <span>{{$mahasiswa->jenis_kelamin}}</span></li>

                            </ul>
                        </div>

                        <div class="text-center"><a href="/mahasiswa/{{$mahasiswa->id}}/edit"
                                class="btn btn-warning">Edit Profile</a></div>
                    </div>
                    <!-- END PROFILE DETAIL -->

                </div>
            </div>
            <!-- END LEFT COLUMN -->
            <!-- RIGHT COLUMN -->
            <div class="profile-right">
                <div class="tab-nilai">
                    <ul>
                        <li href="" class="btn btn-warning"> Aspirasi Advokasi</li>
                        <li href="" class="btn btn-success"> Aspirasi Advokasi</li>
                        <li href="" class="btn btn-success"> Aspirasi Advokasi</li>
                        <li href="" class="btn btn-success"> Aspirasi Advokasi</li>
                    </ul>
                </div>

                <!-- TABBED CONTENT -->
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-12">
                            <div class="panel-body">
                                <div class="tambahnilai">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Tambah Nilai
                                    </button>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kriteria</th>
                                            <th>Bobot Kriteria</th>
                                            <th>Nilai Klasifikasi</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach($mahasiswa->KriteriaAspirasi as $kriteria)
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$kriteria->nama_kriteria}}</td>
                                            <td>{{$kriteria->pivot->nilai_bobot_kriteria}}</td>
                                            <td>
                                                {{$kriteria->pivot->nilai}}
                                            </td>

                                            <td><a href="/mahasiswa/{{$mahasiswa->id}}/{{$kriteria->id}}/deletenilai"
                                                    class="btn btn-danger btn-sm">Delete </td>
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong class="modal-title" id="exampleModalLabel">Tambah Nilai</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/mahasiswa/{{$mahasiswa->id}}/addnilai" method="POST"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">

                                <label for="kriteria">Pilih Kriteria : </label>
                                <select class="form-control" id="kriteria_aspirasi" name="KriteriaAspirasi">
                                    @foreach ($tambah as $krt)
                                    <option selected value="{{$krt->id}}">{{$krt->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bobot_kriteria">Pilih Bobot Kriteria : </label>
                                <select class="form-control" id="nilai_bobot_kriteria" name="nilai_bobot_kriteria">
                                    @foreach ($tambah as $krt)
                                    <option selected value="{{$krt->bobot_kriteria}}">{{$krt->bobot_kriteria}} ----
                                        {{$krt->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">

                                <label for="kriteria">Masukkan Nilai : </label>
                                <select class="form-control" id="nilai" name="nilai">
                                    <option selected value="1">A</option>
                                    <option value="0.75">B</option>
                                    <option value="0.50">C</option>
                                    <option value="0.25">D</option>
                                    <option value="0">E</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
@section('footer')

<script>
    $(document).ready(function() {
        $('.nilai').editable();
    });
</script>
@stop