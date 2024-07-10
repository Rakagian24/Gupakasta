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
                                                <td>{{ $rn->sub_kegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $rn->sub_kegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $rn->sub_kegiatan->kegiatan->program->kode_program }}.01
                                                </td>
                                                <td>{{ $rn->sub_kegiatan->kegiatan->program->nama_program }}
                                                </td>
                                                <td>{{ $rn->anggaran }}</td>
                                                <td>{{ $rn->akumulasi_sebelumnya }}</td>
                                                <td>{{ $rn->pencairan }}</td>
                                                <td>{{ $rn->sisa_anggaran }}</td>
                                                <td>{{ $rn->nomer }}</td>
                                                <td>
                                                    <span class="table-edit">
                                                        <a href="{{ route('rincian_dana.edit', $rn->id) }}"
                                                            class="btn bg-info-light btn-rounded btn-sm my-0">Edit</a>
                                                    </span>
                                                    <span class="table-remove">
                                                        <form action="{{ route('rincian_dana.destroy', $rn->id) }}"
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
