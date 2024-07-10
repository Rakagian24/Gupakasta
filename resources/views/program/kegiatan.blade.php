@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Kegiatan</h4>
                            </div>
                            <div class="header-action">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Urusan</th>
                                            <th>Kode Bidang Urusan</th>
                                            <th>Kode Program</th>
                                            <th>Kode Kegiatan</th>
                                            <th>Nama Kegiatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kegiatans as $kegiatan)
                                            <tr>
                                                <td>{{ $kegiatan->program->bidangUrusan->urusan->kode_urusan }}</td>
                                                <td>{{ $kegiatan->program->bidangUrusan->kode_bidang_urusan }}</td>
                                                <td>{{ $kegiatan->program->kode_program }}</td>
                                                <td>{{ $kegiatan->kode_kegiatan }}</td>
                                                <td>{{ $kegiatan->nama_kegiatan }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Kegiatan belum Tersedia.
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
