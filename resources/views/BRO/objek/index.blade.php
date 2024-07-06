@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Buku Rincian Objek</h4>
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
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="/bro/objek/create" class="btn btn-sm bg-primary"><i class="ri-add-fill"><span
                                            class="pl-1">Add
                                            New</span></i></a>
                            </span>
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>SKPD</th>
                                            <th>Kode Rekening</th>
                                            <th>Nama Kode Rekening</th>
                                            <th>Jumlah Anggaran RKA</th>
                                            <th>Tahun Anggaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bukuObjek as $b)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $b->SKPD }}</td>
                                                <td>{{ $b->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.{{ $b->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.{{ $b->subRincianObjek->rincianObjek->objek->jenis->kode_jenis }}.{{ $b->subRincianObjek->rincianObjek->objek->kode_objek }}.{{ $b->subRincianObjek->rincianObjek->kode_rincian_objek }}.{{ $b->subRincianObjek->kode_sub_rincian_objek }}
                                                </td>
                                                <td>{{ $b->subRincianObjek->nama_sub_rincian_objek }}</td>
                                                <td>{{ formatRupiah($b->jumlah) }}</td>
                                                <td>{{ $b->tahun }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Rincian Objek belum Tersedia.
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
