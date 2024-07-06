@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Rekening Sub Rincian Objek</h4>
                            </div>
                            <div class="header-action">
                                <i data-toggle="collapse" data-target="#datatable-1" aria-expanded="false">
                                    <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Akun</th>
                                            <th>Kode Kelompok</th>
                                            <th>Kode Jenis</th>
                                            <th>Kode Objek</th>
                                            <th>Kode Rincian Objek</th>
                                            <th>Kode Sub Rincian Objek</th>
                                            <th>Nama Sub Rincian Objek</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subRincianObjeks as $sro)
                                            <tr>
                                                <td>{{ $sro->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}</td>
                                                <td>{{ $sro->rincianObjek->objek->jenis->kelompok->kode_kelompok }}</td>
                                                <td>{{ $sro->rincianObjek->objek->jenis->kode_jenis }}</td>
                                                <td>{{ $sro->rincianObjek->objek->kode_objek }}</td>
                                                <td>{{ $sro->rincianObjek->kode_rincian_objek }}</td>
                                                <td>{{ $sro->kode_sub_rincian_objek }}</td>
                                                <td>{{ $sro->nama_sub_rincian_objek }}</td>
                                                <td>{{ $sro->deskripsi }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Sub Rincian Objek belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
