@extends('layout/master')
@section('dashboard', 'active')
@section('content')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Dashboard</h3>
                    <p class="panel-subtitle">SPK Kenaikan Kader HMIF Amikom</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-users"></i></span>
                                <p>
                                    <span class="number">{{$total}}</span>
                                    <span class="title">Mahasiswa</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-database"></i></span>
                                <p>
                                    <span class="number">{{$totaldivisi}}</span>
                                    <span class="title">Divisi</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">{{$totalkriteria}}</span>
                                    <span class="title">Kriteria</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-lock"></i></span>
                                <p>
                                    <span class="number">{{$totaluser}}</span>
                                    <span class="title">Users</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabel Peringkat --}}
            <!-- END OVERVIEW -->
            <div class="row">
                <div class="col-md-6">
                    <!-- RECENT PURCHASES -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Rekomendasi Anggota Aspirasi</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i
                                        class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nim</th>
                                        <th>Kelas</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($data_mahasiswa as $mahasiswa)
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{$mahasiswa->nama_mahasiswa}}</td>
                                        <td>{{$mahasiswa->nim}}</td>
                                        <td>{{$mahasiswa->kelas}}</td>
                                        <td>{{round($mahasiswa->smartAspirasi(),2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-6 col-xs-6"><span class="panel-note"><i
                                            class="fa fa-folder-open-o"></i>
                                        Total Kriteria : {{$aspirasi}}</span></div>
                                <div class="col-md-6 col-md-6 col-xs-6 text-right"><a href="/aspirasi/smart"
                                        class="btn btn-primary">Lihat Semua
                                        Nilai</a></div>
                            </div>
                        </div>

                    </div>
                    <!-- END RECENT PURCHASES -->
                </div>
                <div class="col-md-6">
                    <!-- RECENT PURCHASES -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Rekomendasi Anggota Litbang</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i
                                        class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nim</th>
                                        <th>Kelas</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($rangkinglitbang as $mahasiswa)
                                        <th class="text-center">{{$loop->iteration}}</th>
                                        <td>{{$mahasiswa->nama_mahasiswa}}</td>
                                        <td>{{$mahasiswa->nim}}</td>
                                        <td>{{$mahasiswa->kelas}}</td>
                                        <td>{{round($mahasiswa->smartLitbang(),2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-6 col-xs-6"><span class="panel-note"><i
                                            class="fa fa-folder-open-o"></i>
                                        Total Kriteria : {{$litbang}}</span></div>
                                <div class="col-md-6 col-md-6 col-xs-6 text-right"><a href="/litbang/smart"
                                        class="btn btn-primary">Lihat Semua
                                        Nilai</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- END RECENT PURCHASES -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- RECENT PURCHASES -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Rekomendasi Anggota Humas</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i
                                        class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nim</th>
                                        <th>Kelas</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($rangkinghumas as $mahasiswa)
                                        <th class="text-center">{{$loop->iteration}}</th>
                                        <td>{{$mahasiswa->nama_mahasiswa}}</td>
                                        <td>{{$mahasiswa->nim}}</td>
                                        <td>{{$mahasiswa->kelas}}</td>
                                        <td>{{round($mahasiswa->smartHumas(),2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-6 col-xs-6"><span class="panel-note"><i
                                            class="fa fa-folder-open-o"></i>
                                        Total Kriteria : {{$humas}}</span></div>
                                <div class="col-md-6 col-md-6 col-xs-6 text-right"><a href="/humas/smart"
                                        class="btn btn-primary">Lihat Semua
                                        Nilai</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- END RECENT PURCHASES -->
                </div>
                <div class="col-md-6">
                    <!-- RECENT PURCHASES -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Rekomendasi Anggota Keorganisasian</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i
                                        class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nim</th>
                                        <th>Kelas</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($rangkingkeorganisasian as $mahasiswa)
                                        <th class="text-center">{{$loop->iteration}}</th>
                                        <td>{{$mahasiswa->nama_mahasiswa}}</td>
                                        <td>{{$mahasiswa->nim}}</td>
                                        <td>{{$mahasiswa->kelas}}</td>
                                        <td>{{round($mahasiswa->smartKeorganisasian(),2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-6 col-xs-6"><span class="panel-note"><i
                                            class="fa fa-folder-open-o"></i>
                                        Total Kriteria : {{$keorganisasian}}</span></div>
                                <div class="col-md-6 col-md-6 col-xs-6 text-right"><a href="/keorganisasian/smart"
                                        class="btn btn-primary">Lihat Semua
                                        Nilai</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- END RECENT PURCHASES -->
                </div>
            </div>
        </div>
    </div>
</div>
@stop