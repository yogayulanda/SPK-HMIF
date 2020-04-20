@extends('layout/master')
@section('content')
@if(session('sukses'))
@endif
<!-- Kriteria Tabel -->
<div class="main">
    <div class="main-content">
        {{-- Nilai Aspirasi Advokasi --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="panel-title">Profile Nilai Mahasiswa</h1>
                    <br>
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Aspirasi Dan Advokasi</h3>
                            @if (auth()->user()->role =='admin' || auth()->user()->role == 'aspirasi' )
                            <div class="text-right">
                                <a type="button" class="btn btn-input" data-toggle="modal" data-target="#exampleModal">
                                    Input Nilai Aspirasi
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot Kriteria</th>
                                        <th>Nilai</th>
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'aspirasi' )
                                        <th>Aksi</th>
                                        @endif
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
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'aspirasi' )
                                        <td><a href="/mahasiswa/{{$mahasiswa->id}}/{{$kriteria->id}}/deletenilai"
                                                class="btn btn-delete"><i class="fa fa-trash"></i></td>
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
                                <select class="form-control" id="id_aspirasi" name="KriteriaAspirasi">
                                    <option selected value="0"> Pilih Kriteria</option>
                                    @foreach ($tambah as $krt)
                                    <option value="{{$krt->id}}">{{$krt->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                                <input name="nilai_bobot_kriteria" type="hidden" id="bobot">
                            </div>
                            <div class="form-group">
                                <label for="kriteria">Masukkan Nilai : </label>
                                <select class="form-control" id="nilai" name="nilai">
                                    <option selected value="100">A</option>
                                    <option value="80">B</option>
                                    <option value="60">C</option>
                                    <option value="40">D</option>
                                    <option value="20">E</option>
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
        {{-- Nilai Humas --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Hubungan Masyarakat</h3>
                            @if (auth()->user()->role =='admin' || auth()->user()->role == 'humas' )
                            <div class="text-right">
                                <a type="button" class="btn btn-input" data-toggle="modal" data-target="#exampleModal1">
                                    Input Nilai Humas
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot Kriteria</th>
                                        <th>Nilai</th>
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'humas' )
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($mahasiswa->KriteriaHumas as $kriteria)
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$kriteria->nama_kriteria}}</td>
                                        <td>{{$kriteria->pivot->nilai_bobot_kriteria}}</td>
                                        <td>
                                            {{$kriteria->pivot->nilai}}
                                        </td>
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'humas' )
                                        <td><a href="/mahasiswa/{{$mahasiswa->id}}/{{$kriteria->id}}/deletenilaihumas"
                                                class="btn btn-delete"><i class="fa fa-trash"></td>
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
        <!-- Modal Humas -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong class="modal-title" id="exampleModalLabel">Tambah Nilai Humas</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/mahasiswa/{{$mahasiswa->id}}/addnilaiHumas" method="POST"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">

                                <label for="kriteria">Pilih Kriteria : </label>
                                <select class="form-control" id="id_humas" name="KriteriaHumas">
                                    <option selected value="0"> Pilih Kriteria</option>
                                    @foreach ($humas as $krt)
                                    <option value="{{$krt->id}}">{{$krt->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                                <input name="nilai_bobot_kriteria" type="hidden" id="bobothumas">
                            </div>
                            <div class="form-group">

                                <label for="kriteria">Masukkan Nilai : </label>
                                <select class="form-control" id="nilai" name="nilai">
                                    <option selected value="100">A</option>
                                    <option value="80">B</option>
                                    <option value="60">C</option>
                                    <option value="40">D</option>
                                    <option value="20">E</option>
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
        {{-- Nilai Keilmuan, Penelitian dan Pengembangan --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Nilai Keilmuan, Penelitian dan Pengembangan</h3>
                            @if (auth()->user()->role =='admin' || auth()->user()->role == 'litbang' )
                            <div class="text-right">
                                <a type="button" class="btn btn-input" data-toggle="modal" data-target="#exampleModal2">
                                    Input Nilai Litbang
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot Kriteria</th>
                                        <th>Nilai</th>
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'litbang' )
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($mahasiswa->KriteriaLitbang as $kriteria)
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$kriteria->nama_kriteria}}</td>
                                        <td>{{$kriteria->pivot->nilai_bobot_kriteria}}</td>
                                        <td>
                                            {{$kriteria->pivot->nilai}}
                                        </td>
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'litbang' )
                                        <td><a href="/mahasiswa/{{$mahasiswa->id}}/{{$kriteria->id}}/deletenilailitbang"
                                                class="btn btn-delete"><i class="fa fa-trash"></td>
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
        {{-- MOdal Litbang --}}
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong class="modal-title" id="exampleModalLabel">Tambah Nilai Litbang</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/mahasiswa/{{$mahasiswa->id}}/addnilaiLitbang" method="POST"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">

                                <label for="kriteria">Pilih Kriteria : </label>
                                <select class="form-control" id="id_litbang" name="KriteriaLitbang">
                                    <option selected value="0"> Pilih Kriteria</option>
                                    @foreach ($litbang as $krt)
                                    <option value="{{$krt->id}}">{{$krt->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                                <input name="nilai_bobot_kriteria" type="hidden" id="bobotlitbang">
                            </div>
                            <div class="form-group">
                                <label for="kriteria">Masukkan Nilai : </label>
                                <select class="form-control" id="nilai" name="nilai">
                                    <option selected value="100">A</option>
                                    <option value="80">B</option>
                                    <option value="60">C</option>
                                    <option value="40">D</option>
                                    <option value="20">E</option>
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
        {{-- Nilai Keorganisasian --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Keorganisasian</h3>
                            @if (auth()->user()->role =='admin' || auth()->user()->role == 'keorganisasian' )
                            <div class="text-right">
                                <a type="button" class="btn btn-input" data-toggle="modal" data-target="#exampleModal3">
                                    Input Nilai Keorganisasian
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot Kriteria</th>
                                        <th>Nilai</th>
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'keorganisasian'
                                        )
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($mahasiswa->KriteriaKeorganisasian as $kriteria)
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$kriteria->nama_kriteria}}</td>
                                        <td>{{$kriteria->pivot->nilai_bobot_kriteria}}</td>
                                        <td>
                                            {{$kriteria->pivot->nilai}}
                                        </td>
                                        @if (auth()->user()->role =='admin' || auth()->user()->role == 'keorganisasian'
                                        )
                                        <td><a href="/mahasiswa/{{$mahasiswa->id}}/{{$kriteria->id}}/deletenilaikeorganisasian"
                                                class="btn btn-delete"><i class="fa fa-trash"></td>
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
        {{-- Modal Keorganisasian --}}
        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong class="modal-title" id="exampleModalLabel">Tambah Nilai Keorganisasian</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/mahasiswa/{{$mahasiswa->id}}/addnilaiKeorganisasian" method="POST"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">

                                <label for="kriteria">Pilih Kriteria : </label>
                                <select class="form-control" id="id_keorganisasian" name="KriteriaKeorganisasian">
                                    <option selected value="0"> Pilih Kriteria</option>
                                    @foreach ($keorganisasian as $krt)
                                    <option value="{{$krt->id}}">{{$krt->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                                <input name="nilai_bobot_kriteria" type="hidden" id="bobotkeorganisasian">
                            </div>
                            <div class="form-group">

                                <label for="kriteria">Masukkan Nilai : </label>
                                <select class="form-control" id="nilai" name="nilai">
                                    <option selected value="100">A</option>
                                    <option value="80">B</option>
                                    <option value="60">C</option>
                                    <option value="40">D</option>
                                    <option value="20">E</option>
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
@stop
@section('footer')

<script>
    $(document).ready(function() {
        // Aspirasi
        $(document).on('change','#id_aspirasi',function(){
            var id_aspirasi=$(this).val();
			var a=$(this).parent();
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findBobot')!!}',
				data:{'id':id_aspirasi},
				dataType:'json',//return data will be json
				success:function(data){
                    a.find('#bobot').val(data.info);
				},
				error:function(){

                }
			});
        });
        // Humas
        $(document).on('change','#id_humas',function(){
            var id_humas=$(this).val();
			var a=$(this).parent();
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findBobotHumas')!!}',
				data:{'id':id_humas},
				dataType:'json',//return data will be json
				success:function(data){
                    a.find('#bobothumas').val(data.info);
				},
				error:function(){

                }
			});
        });

        // Litbang
        $(document).on('change','#id_litbang',function(){
            var id_litbang=$(this).val();
			var a=$(this).parent();
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findBobotLitbang')!!}',
				data:{'id':id_litbang},
				dataType:'json',//return data will be json
				success:function(data){
                    a.find('#bobotlitbang').val(data.info);
				},
				error:function(){

                }
			});
        });
        // Keorganisasian
        $(document).on('change','#id_keorganisasian',function(){
            var id_keorganisasian=$(this).val();
			var a=$(this).parent();
			$.ajax({
				type:'get',
				url:'{!!URL::to('findBobotKeorganisasian')!!}',
				data:{'id':id_keorganisasian},
				dataType:'json',//return data will be json
				success:function(data){
                    a.find('#bobotkeorganisasian').val(data.info);
				},
				error:function(){

                }
			});
        });
        // Datatable
        $('.nilai').editable();
    });

</script>
@stop