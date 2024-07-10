@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Kode Rekening Akun</h4>
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
                                            <th>Nama Akun</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($akuns as $akun)
                                            <tr>
                                                <td>{{ $akun->kode_akun }}</td>
                                                <td>{{ $akun->nama_akun }}</td>
                                                <td>{{ $akun->deskripsi }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Akun belum Tersedia.
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
