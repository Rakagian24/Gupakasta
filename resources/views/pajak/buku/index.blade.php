@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Pajak</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('rekening.index', $anggaranKegiatanId, $anggaranSubKegiatanId) }} --}}

                            </div>
                        </div>
                        <div class="card-body">
                            <span class="table-add float-right mb-3 mr-2">
                                {{-- <a href="{{ route('buku_rincian_objek.create', ['anggaran_rekening_id' => $anggaranRekening->id]) }}"
                                    class="btn btn-sm bg-primary">
                                    <i class="ri-add-fill">
                                        <span class="pl-1">Add New</span>
                                    </i>
                                </a> --}}
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
                                        @forelse ($pajak as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->tanggal }}</td>
                                                <td>{{ $p->no_bukti }}</td>
                                                <td>{{ $p->uraian }}</td>
                                                <td>{{ formatRupiah($p->ls) }}</td>
                                                <td>{{ formatRupiah($p->gu) }}</td>
                                                <td>{{ formatRupiah($p->saldo) }}</td>
                                                <td>
                                                    <span class="table-edit">
                                                        <a href="{{ route('buku.show', $p->id) }}"
                                                            class="btn bg-info-light btn-rounded btn-sm my-0">Rincian</a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Pajak belum Tersedia.
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
