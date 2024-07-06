@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Sub Kegiatan</h4>
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
                                            <th>Kode Urusan</th>
                                            <th>Kode Bidang Urusan</th>
                                            <th>Kode Program</th>
                                            <th>Kode Kegiatan</th>
                                            <th>Kode Sub Kegiatan</th>
                                            <th>Nama Sub Kegiatan</th>
                                            <th>Kinerja</th>
                                            <th>Indikator</th>
                                            <th>Satuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subKegiatans as $subKegiatan)
                                            <tr>
                                                <td>{{ $subKegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}
                                                </td>
                                                <td>{{ $subKegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}
                                                </td>
                                                <td>{{ $subKegiatan->kegiatan->program->kode_program }}</td>
                                                <td>{{ $subKegiatan->kegiatan->kode_kegiatan }}</td>
                                                <td>{{ $subKegiatan->kode_sub_kegiatan }}</td>
                                                <td>{{ $subKegiatan->kinerja }}</td>
                                                <td>{{ $subKegiatan->indikator }}</td>
                                                <td>{{ $subKegiatan->satuan }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Sub Kegiatan belum Tersedia.
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
