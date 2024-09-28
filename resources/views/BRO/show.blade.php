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
                            @if ($anggaranRekening)
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">SKPD</span>
                                        <span>: Dinas Perumahan dan Kawasan Permukiman</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Kode Rekening</span>
                                        <span>:
                                            {{ $anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.
                                            {{ $anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.
                                            {{ $anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kode_jenis }}.
                                            {{ $anggaranRekening->subRincianObjek->rincianObjek->objek->kode_objek }}.
                                            {{ $anggaranRekening->subRincianObjek->rincianObjek->kode_rincian_objek }}.
                                            {{ $anggaranRekening->subRincianObjek->kode_sub_rincian_objek }}
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Nama Rekening</span>
                                        <span>: {{ $anggaranRekening->subRincianObjek->nama_sub_rincian_objek }}</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Jumlah Anggaran (RKA)</span>
                                        <span>: {{ formatRupiah($anggaranRekening->sisa_anggaran) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Tahun Anggaran</span>
                                        <span>: {{ $anggaranRekening->created_at->year }}</span>
                                    </li>
                                </ul>
                            @else
                                <p>Tidak ditemukan data untuk ID rekening anggaran yang diberikan.</p>
                            @endif

                            <span class="table-add float-right mb-3 mr-2">
                                <a href="{{ route('buku_rincian_objek.create', ['anggaran_rekening_id' => $anggaranRekening->id]) }}"
                                    class="btn btn-sm bg-primary">
                                    <i class="ri-add-fill">
                                        <span class="pl-1">Add New</span>
                                    </i>
                                </a>
                            </span>

                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No. Bukti</th>
                                            <th>Uraian</th>
                                            <th>LS</th>
                                            <th>UP/GU/TU</th>
                                            <th>Saldo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bukuRincianObjek as $bro)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $bro->tanggal }}</td>
                                                <td>{{ $bro->no_bukti }}</td>
                                                <td>{{ $bro->uraian }}</td>
                                                <td>{{ formatRupiah($bro->ls) }}</td>
                                                <td>{{ formatRupiah($bro->gu) }}</td>
                                                <td>{{ formatRupiah($bro->saldo) }}</td>
                                                <td>
                                                    <span class="table-edit">
                                                        <a href="{{ route('buku_rincian_objek.edit', $bro->id) }}"
                                                            class="btn bg-info-light btn-rounded btn-sm my-0">Edit</a>
                                                    </span>
                                                    <span class="table-remove">
                                                        <form action="{{ route('buku_rincian_objek.destroy', $bro->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn bg-danger-light btn-rounded btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                        </form>
                                                    </span>
                                                    <span class="table-edit">
                                                        <a href="{{ route('pajak.bro.create', ['kode_bro' => $bro->id]) }}"
                                                            class="btn bg-info-light btn-rounded btn-sm my-0">Tambah
                                                            Pajak</a>
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
