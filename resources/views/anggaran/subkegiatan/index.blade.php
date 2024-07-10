@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Anggaran Sub Kegiatan</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('sub_kegiatan.index', $anggaranKegiatanId) }} --}}

                            </div>
                        </div>
                        <div class="card-body">
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="{{ route('sub_kegiatan.create', ['anggaran_kegiatan_id' => $anggaranKegiatanId]) }}"
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
                                            <th>Kode Kegiatan</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($anggaranSubKegiatan as $ask)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ask->subKegiatan->kegiatan->program->kode_program }}.{{ $ask->subKegiatan->kegiatan->kode_kegiatan }}.{{ $ask->subKegiatan->kode_sub_kegiatan }}
                                                </td>
                                                <td>{{ $ask->subKegiatan->nama_sub_kegiatan }}</td>
                                                <td>
                                                    <span class="table-add">
                                                        <a href="{{ route('rekening.index', ['anggaran_sub_kegiatan_id' => $ask->id, 'anggaran_kegiatan_id' => $anggaranKegiatanId]) }}"
                                                            class="btn bg-primary-light btn-rounded btn-sm my-0">Tambah
                                                            Rincian</a>
                                                    </span>
                                                    <span class="table-edit">
                                                        <a href="{{ route('sub_kegiatan.edit', $ask->id) }}"
                                                            class="btn bg-info-light btn-rounded btn-sm my-0">Edit</a>
                                                    </span>
                                                    <span class="table-remove">
                                                        <form action="{{ route('sub_kegiatan.destroy', $ask->id) }}"
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
                                                Data Anggaran Kegiatan belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <a href="/anggaran/kegiatan" class="btn btn-outline-primary mt-2">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
