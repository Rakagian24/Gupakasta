@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Buku Besar Pembantu</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('rekening.index', $anggaranKegiatanId, $anggaranSubKegiatanId) }} --}}

                            </div>
                        </div>
                        <div class="card-body">
                            @if ($subKegiatan)
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Urusan Pemerintahan :</span>
                                        <span>{{ $subKegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }} |
                                            {{ $subKegiatan->kegiatan->program->bidangUrusan->urusan->nama_urusan }}</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Bidang Pemerintahan :</span>
                                        <span>{{ $subKegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }} |
                                            {{ $subKegiatan->kegiatan->program->bidangUrusan->nama_bidang_urusan }}</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Unit Organisasi :</span>
                                        <span>Dinas Perumahan dan Kawasan Permukiman</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Sub Unit Organisasi :</span>
                                        <span>Sekretariat</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Kode Rekening Buku Besar Pembantu
                                            :</span>
                                        <span></span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Nama Rekening Buku Besar Pembantu
                                            :</span>
                                        <span>Kas Di Bendahara Pengeluaran Pembantu</span>
                                    </li>
                                </ul>
                            @else
                                <p>Tidak ditemukan data untuk ID Sub Kegiatan yang diberikan.</p>
                            @endif
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No Bukti</th>
                                            <th>Uraian</th>
                                            <th>Kode Rekening</th>
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                            <th>Saldo</th>
                                            {{-- <th>Sisa Anggaran</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bukuBesarPembantu as $bbp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $test->tanggal }}</td>
                                                <td>{{ $test->no_bukti }}</td>
                                                <td>{{ $test->uraian }}</td>
                                                <td>{{ $test->subKegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $test->subKegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $test->subKegiatan->kegiatan->program->kode_program }}.{{ $test->subKegiatan->kegiatan->kode_kegiatan }}.{{ $test->subKegiatan->kode_sub_kegiatan }}.{{ $bbp->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.{{ $bbp->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.{{ $bbp->subRincianObjek->rincianObjek->objek->jenis->kode_jenis }}.{{ $bbp->subRincianObjek->rincianObjek->objek->kode_objek }}.{{ $bbp->subRincianObjek->rincianObjek->kode_rincian_objek }}.{{ $bbp->subRincianObjek->kode_sub_rincian_objek }}
                                                </td>
                                                <td>{{ formatRupiah($test->pencairan) }}</td>
                                                <td>{{ formatRupiah($test->gu) }}</td>
                                                <td>{{ formatRupiah($test->saldo) }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Buku Besar Pembantu belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                    {{-- <tfoot>
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
                                    </tfoot> --}}
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
