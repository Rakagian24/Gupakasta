@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Rencana Kerja dan Anggaran (RKA)</h4>
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
                                            <th>Kode Rekening</th>
                                            <th>Nama Rekening</th>
                                            <th>Anggaran</th>
                                            <th>s.d SPJ Lalu</th>
                                            <th>LS</th>
                                            <th>GU</th>
                                            <th>s.d SPJ Ini</th>
                                            <th>Sisa Anggaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rencanaKerjaAnggaran as $rka)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rka->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.{{ $rka->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.{{ $rka->subRincianObjek->rincianObjek->objek->jenis->kode_jenis }}.{{ $rka->subRincianObjek->rincianObjek->objek->kode_objek }}.{{ $rka->subRincianObjek->rincianObjek->kode_rincian_objek }}.{{ $rka->subRincianObjek->kode_sub_rincian_objek }}
                                                </td>
                                                <td>{{ $rka->subRincianObjek->nama_sub_rincian_objek }}</td>
                                                <td>{{ formatRupiah($rka->anggaran) }}</td>
                                                <td>{{ formatRupiah($rka->spj_lalu) }}</td>
                                                <td>{{ formatRupiah($rka->ls) }}</td>
                                                <td>{{ formatRupiah($rka->gu) }}</td>
                                                <td>{{ formatRupiah($rka->spj_ini) }}</td>
                                                <td>{{ formatRupiah($rka->sisa_anggaran) }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Rekening belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="8" class="text-right"><strong>Total Sisa Anggaran:</strong></td>
                                            <td>
                                                @php
                                                    $totalSisaAnggaran = $rencanaKerjaAnggaran->sum('sisa_anggaran');
                                                @endphp
                                                {{ formatRupiah($totalSisaAnggaran) }}
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{-- <a href="{{ route('sub_kegiatan.index', ['anggaran_kegiatan_id' => $anggaranKegiatanId]) }}"
                                    class="btn btn-outline-primary mt-2">Kembali</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
