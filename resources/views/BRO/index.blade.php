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
                                {{-- {{ Breadcrumbs::render('rekening.index', $anggaranKegiatanId, $anggaranSubKegiatanId) }} --}}

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>SKPD</th>
                                            <th>Kode Rekening</th>
                                            <th>Nama Rekening</th>
                                            <th>Jumlah Anggaran (RKA)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bukuRincianObjek as $bro)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Dinas Perumahan dan Kawasan Permukiman</td>
                                                <td>{{ $bro->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.{{ $bro->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.{{ $bro->subRincianObjek->rincianObjek->objek->jenis->kode_jenis }}.{{ $bro->subRincianObjek->rincianObjek->objek->kode_objek }}.{{ $bro->subRincianObjek->rincianObjek->kode_rincian_objek }}.{{ $bro->subRincianObjek->kode_sub_rincian_objek }}
                                                </td>
                                                <td>{{ $bro->subRincianObjek->nama_sub_rincian_objek }}</td>
                                                <td>{{ formatRupiah($bro->sisa_anggaran) }}</td>
                                                <td>
                                                    <span class="table-add">
                                                        <a href="{{ route('buku_rincian_objek.show', $bro->id) }}"
                                                            class="btn bg-primary-light btn-rounded btn-sm my-0">Tambah
                                                            Rincian</a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Buku Rincian Objek belum Tersedia.
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
