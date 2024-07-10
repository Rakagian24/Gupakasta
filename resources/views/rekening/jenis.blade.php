@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Rekening Jenis</h4>
                            </div>
                            <div class="header-action">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Akun</th>
                                            <th>Kode Kelompok</th>
                                            <th>Kode Jenis</th>
                                            <th>Nama Jenis</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jeniss as $jenis)
                                            <tr>
                                                <td>{{ $jenis->kelompok->akun->kode_akun }}</td>
                                                <td>{{ $jenis->kelompok->kode_kelompok }}</td>
                                                <td>{{ $jenis->kode_jenis }}</td>
                                                <td>{{ $jenis->nama_jenis }}</td>
                                                <td>{{ $jenis->deskripsi }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Jenis belum Tersedia.
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
