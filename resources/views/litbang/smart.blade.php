@extends('layout/master')
@section('content')
<!-- Utility Tabel -->
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Perhitungan SMART Litbang</h3>
                            <div class="text-right">
                                <a href="/litbang/export/" class="btn btn-input margin-bottom-10"> Export <i
                                        class="fa fa-download"></i></a>
                                <a href="/litbang/" class="btn btn-tombol">Back</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover" id="litbangsmart">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        @foreach($kriteria as $krt)
                                        <th>{{$krt->nama_kriteria}}</th>
                                        @endforeach
                                        <th>Hasil Perhitungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_mahasiswa as $p)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $p->nama_mahasiswa }}</td>
                                        @foreach($p->KriteriaLitbang as $n)
                                        <td>{{ $n->pivot->nilai}}</td>
                                        @endforeach
                                        <td>{{round($p->smartLitbang(),2)}}</<td>
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
@section('footer')
<script>
    $(document).ready(function(){ //Semua Fungsi diatas dijalankan apabila document/ halaman sudah ready semua
    $('#litbangsmart').DataTable();         // Deklarasi Data Table
    });
</script>
@endsection