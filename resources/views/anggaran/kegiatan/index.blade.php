@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Anggaran Kegiatan</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('kegiatan.index') }} --}}

                            </div>
                        </div>
                        <div class="card-body">
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="/anggaran/kegiatan/create" class="btn btn-sm bg-primary"><i
                                        class="ri-add-fill"><span class="pl-1">Add
                                            New</span></i></a>
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
                                        @forelse ($anggaranKegiatan as $ak)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ak->kegiatan->program->kode_program }}.{{ $ak->kode_kegiatan }}</td>
                                                <td>{{ $ak->kegiatan->nama_kegiatan }}</td>
                                                <td>
                                                    <span class="table-add">
                                                        <a href="{{ route('sub_kegiatan.index', ['anggaran_kegiatan_id' => $ak->id]) }}"
                                                            class="btn bg-primary-light btn-rounded btn-sm my-0">Tambah
                                                            Rincian</a>
                                                    </span>
                                                    <span class="table-edit">
                                                        <a href="{{ route('kegiatan.edit', $ak->id) }}"
                                                            class="btn bg-info-light btn-rounded btn-sm my-0">Edit</a>
                                                    </span>
                                                    <span class="table-remove">
                                                        <form action="{{ route('kegiatan.destroy', $ak->id) }}"
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
