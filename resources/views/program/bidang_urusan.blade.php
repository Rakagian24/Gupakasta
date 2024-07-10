@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Bidang Urusan</h4>
                            </div>
                            <div class="header-action">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Urusan</th>
                                            <th>Kode Bidang Urusan</th>
                                            <th>Nama Bidang Urusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bidangUrusans as $bidangUrusan)
                                            <tr>
                                                <td>{{ $bidangUrusan->urusan->kode_urusan }}</td>
                                                <td>{{ $bidangUrusan->kode_bidang_urusan }}</td>
                                                <td>{{ $bidangUrusan->nama_bidang_urusan }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Bidang Urusan belum Tersedia.
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
