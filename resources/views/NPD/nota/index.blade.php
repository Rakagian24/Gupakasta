@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Nota Pencairan Dana</h4>
                            </div>
                            <div class="header-action">
                                <i data-toggle="collapse" data-target="#datatable-1" aria-expanded="false">
                                    <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </i>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="/bro/nota/create" class="btn btn-sm bg-primary"><i class="ri-add-fill"><span
                                            class="pl-1">Add
                                            New</span></i></a>
                            </span>
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>PPTK</th>
                                            <th>Program</th>
                                            <th>Kegiatan</th>
                                            <th>Sub Kegiatan</th>
                                            <th>Tahun Anggaran</th>
                                            <th>Nomer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($nota as $n)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $n->PPTK }}</td>
                                                <td>{{ $n->kode_program }}</td>
                                                <td>{{ $n->kode_kegiatan }}</td>
                                                <td>{{ $n->sub_kegiatan->kode_sub_kegiatan }}</td>
                                                <td>{{ $n->Tahun }}</td>
                                                <td>{{ $n->Nomer }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Kegiatan belum Tersedia.
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
