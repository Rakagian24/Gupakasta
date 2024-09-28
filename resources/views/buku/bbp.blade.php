@extends('layouts.main')

@section('wrapper')
    <style>
        .col-no {
            width: 5%;
            /* Atur lebar sesuai kebutuhan */
        }

        .col-date {
            width: 10%;
        }

        .col-no-bukti {
            width: 10%;
        }

        .col-uraian {
            width: 25%;
        }

        .col-kode-rekening {
            width: 20%;
        }

        .col-debet,
        .col-kredit,
        .col-saldo {
            width: 10%;
        }

        .word-break {
            word-wrap: break-word;
            /* Memotong kata jika terlalu panjang */
            word-break: break-all;
            /* Memaksa teks panjang dipotong di manapun */
            white-space: normal;
        }
    </style>

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Buku Kas Umum</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('rekening.index', $anggaranKegiatanId, $anggaranSubKegiatanId) }} --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item d-flex">
                                    <span class="flex-shrink-0" style="width: 250px;">Urusan Pemerintahan</span>
                                    <span>: 1 | Urusan Wajib Pelayanan Dasar</span>
                                </li>
                                <li class="list-group-item d-flex">
                                    <span class="flex-shrink-0" style="width: 250px;">Bidang Pemerintahan</span>
                                    <span>: 1.04 | Perumahan Rakyat dan Kawasan Pemukiman</span>
                                </li>
                                <li class="list-group-item d-flex">
                                    <span class="flex-shrink-0" style="width: 250px;">Unit Organisasi</span>
                                    <span>: 1.04.01 | Dinas Perumahan dan Kawasan Permukiman</span>
                                </li>
                                <li class="list-group-item d-flex">
                                    <span class="flex-shrink-0" style="width: 250px;">Sub Unit Organisasi</span>
                                    <span>: 1.04.01.02 | Sekretariat</span>
                                </li>
                                <li class="list-group-item d-flex">
                                    <span class="flex-shrink-0" style="width: 250px;">Kode Rekening Buku Besar Pembantu
                                    </span>
                                    <span>: </span>
                                </li>
                                <li class="list-group-item d-flex">
                                    <span class="flex-shrink-0" style="width: 250px;">Nama Rekening Buku Besar
                                        Pembantu</span>
                                    <span>: Kas Di Bendahara Pengeluaran Pembantu</span>
                                </li>
                            </ul>
                            <a href="/buku_besar_pembantu/print" target="_blank" class="btn btn-primary">Print
                                PDF</a>
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-no">No</th>
                                            <th class="col-date">Tanggal</th>
                                            <th class="col-no-bukti word-break">No Bukti</th>
                                            <th class="col-uraian">Uraian</th>
                                            <th class="col-kode-rekening word-break">Kode Rekening</th>
                                            <th class="col-debet">Debet</th>
                                            <th class="col-kredit">Kredit</th>
                                            <th class="col-saldo">Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sortedData as $sd)
                                            <tr>
                                                <td class="col-no">{{ $loop->iteration }}</td>
                                                <td class="col-date">{{ $sd->tanggal }}</td>
                                                <td class="col-no-bukti word-break">{{ $sd->no_bukti }}</td>
                                                <td class="col-uraian">{{ $sd->uraian }}</td>
                                                <td class="col-kode-rekening word-break">
                                                    @if (isset($sd->anggaranRekening))
                                                        {{ $sd->anggaranRekening->anggaranSubKegiatan->subKegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $sd->anggaranRekening->anggaranSubKegiatan->subKegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $sd->anggaranRekening->anggaranSubKegiatan->subKegiatan->kegiatan->program->kode_program }}.{{ $sd->anggaranRekening->anggaranSubKegiatan->subKegiatan->kegiatan->kode_kegiatan }}.{{ $sd->anggaranRekening->anggaranSubKegiatan->subKegiatan->kode_sub_kegiatan }}.{{ $sd->anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.{{ $sd->anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.{{ $sd->anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kode_jenis }}.{{ $sd->anggaranRekening->subRincianObjek->rincianObjek->objek->kode_objek }}.{{ $sd->anggaranRekening->subRincianObjek->rincianObjek->kode_rincian_objek }}.{{ $sd->anggaranRekening->subRincianObjek->kode_sub_rincian_objek }}
                                                    @endif
                                                </td>
                                                <td class="col-debet">{{ formatRupiah($sd->pencairan) }}</td>
                                                <td class="col-kredit">{{ formatRupiah($sd->gu) }}</td>
                                                <td class="col-saldo">{{ formatRupiah($sd->saldo) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Data Buku Besar Pembantu belum
                                                    tersedia.</td>
                                            </tr>
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
