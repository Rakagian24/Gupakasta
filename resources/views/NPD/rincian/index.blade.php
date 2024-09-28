@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Rincian Nota Pencairan Dana</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('kegiatan.index') }} --}}

                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item">PPTK : {{ $notaPencairanDana->pptk }}</li>
                                <li class="list-group-item">Program :
                                    {{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}
                                    | {{ $notaPencairanDana->sub_kegiatan->kegiatan->program->nama_program }}
                                </li>
                                <li class="list-group-item">Kegiatan :
                                    {{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->kode_program }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->kode_kegiatan }}
                                </li>
                                <li class="list-group-item">Sub Kegiatan :
                                    {{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->kode_program }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->kode_kegiatan }}.{{ $notaPencairanDana->sub_kegiatan->kode_sub_kegiatan }}
                                </li>
                                <li class="list-group-item">Tahun Anggaran : {{ $notaPencairanDana->tahun }}</li>
                                <li class="list-group-item">Nomer : {{ $notaPencairanDana->nomer }} </li>
                            </ul>
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="{{ route('rincian_nota.create', ['npd_id' => $npdId]) }}"
                                    class="btn btn-sm bg-primary"><i class="ri-add-fill"><span class="pl-1">Add
                                            New</span></i></a>
                            </span>
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kode Rekening</th>
                                            <th>Uraian</th>
                                            <th>Anggaran</th>
                                            <th>Akumulasi Sebelumnya</th>
                                            <th>Pencairan Saat Ini</th>
                                            <th>Sisa Anggaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rincianNota as $rn)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rn->tanggal }}</td>
                                                <td>{{ $rn->notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $rn->notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $rn->notaPencairanDana->sub_kegiatan->kegiatan->program->kode_program }}
                                                </td>
                                                <td>{{ $rn->notaPencairanDana->sub_kegiatan->kegiatan->program->nama_program }}
                                                </td>
                                                <td>{{ formatRupiah($rn->anggaran) }}</td>
                                                <td>{{ formatRupiah($rn->akumulasi_sebelumnya) }}</td>
                                                <td>{{ formatRupiah($rn->pencairan) }}</td>
                                                <td>{{ formatRupiah($rn->sisa_anggaran) }}</td>
                                                <td>
                                                    <span class="table-edit">
                                                        <a href="{{ route('rincian_nota.edit', $rn->id) }}"
                                                            class="btn bg-info-light btn-rounded btn-sm my-0">Edit</a>
                                                    </span>
                                                    <span class="table-remove">
                                                        <form action="{{ route('rincian_nota.destroy', $rn->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn bg-danger-light btn-rounded btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                        </form>
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Rincian Nota Pencairan Dana belum Tersedia.
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
