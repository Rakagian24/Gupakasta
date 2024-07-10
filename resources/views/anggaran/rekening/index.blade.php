@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Anggaran Rekening</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('rekening.index', $anggaranKegiatanId, $anggaranSubKegiatanId) }} --}}

                            </div>
                        </div>
                        <div class="card-body">
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="{{ route('rekening.create', ['anggaran_sub_kegiatan_id' => $anggaranSubKegiatanId]) }}"
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
                                            <th>Kode Rekening</th>
                                            <th>Nama Rekening</th>
                                            <th>Anggaran</th>
                                            <th>s.d SPJ Lalu</th>
                                            <th>LS</th>
                                            <th>GU</th>
                                            <th>s.d SPJ Ini</th>
                                            <th>Sisa Anggaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($anggaranRekening as $ar)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ar->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.{{ $ar->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.{{ $ar->subRincianObjek->rincianObjek->objek->jenis->kode_jenis }}.{{ $ar->subRincianObjek->rincianObjek->objek->kode_objek }}.{{ $ar->subRincianObjek->rincianObjek->kode_rincian_objek }}.{{ $ar->subRincianObjek->kode_sub_rincian_objek }}
                                                </td>
                                                <td>{{ $ar->subRincianObjek->nama_sub_rincian_objek }}</td>
                                                <td>{{ formatRupiah($ar->anggaran) }}</td>
                                                <td>{{ formatRupiah($ar->spj_lalu) }}</td>
                                                <td>{{ formatRupiah($ar->ls) }}</td>
                                                <td>{{ formatRupiah($ar->gu) }}</td>
                                                <td>{{ formatRupiah($ar->spj_ini) }}</td>
                                                <td>{{ formatRupiah($ar->sisa_anggaran) }}</td>
                                                <td>
                                                    <span class="table-edit">
                                                        <a href="{{ route('rekening.edit', $ar->id) }}"
                                                            class="btn bg-info-light btn-rounded btn-sm mx-2">Edit</a>
                                                    </span>
                                                    <span class="table-remove">
                                                        <form action="{{ route('rekening.destroy', $ar->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn bg-danger-light btn-rounded btn-sm mx-2"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                        </form>
                                                    </span>
                                                </td>
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
                                                    $totalSisaAnggaran = $anggaranRekening->sum('sisa_anggaran');
                                                @endphp
                                                {{ formatRupiah($totalSisaAnggaran) }}
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a href="{{ route('sub_kegiatan.index', ['anggaran_kegiatan_id' => $anggaranKegiatanId]) }}"
                                    class="btn btn-outline-primary mt-2">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
