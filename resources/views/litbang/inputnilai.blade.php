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
                    <div class="panel-heading">
                        <h3 class="panel-title">Nilai Kriteria</h3>
                    </div>
                    <div class="right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Nilai
                        </button>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Bobot Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($mahasiswa->KriteriaLitbang as $kriteria)
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$kriteria->nama_kriteria}}</td>
                                    <td>{{$kriteria->bobot_kriteria/2}}</td>
                                    <td>{{$kriteria->pivot->nilai}}</td>

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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/litbang/{{$mahasiswa->id}}/inputnilai" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">

                        <label for="exampleFormControlSelect">Pilih Kriteria : </label>
                        <select class="form-control" id="mahasiswa_id" nama="mahasiswa_id">
                            <option selected value=""></option>
                        </select>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label for="example">Nilai Kriteria</label>
                        <input name="nilai" type="text" class="form-control" id="nilai" placeholder="{{old('nilai')}}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection