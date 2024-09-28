@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Kendaraan Dinas Operasional</h4>
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
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Model</th>
                                            <th>Merk/Typer</th>
                                            <th>Isi Silinder</th>
                                            <th>Tahun Pembuatan</th>
                                            <th>No Polisi</th>
                                            <th>Usia</th>
                                            <th>Pemegang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kendaraan as $kdo)
                                            <tr>
                                                <td>{{ $kdo->id }}</td>
                                                <td>{{ $kdo->model }}</td>
                                                <td>{{ $kdo->merk }}</td>
                                                <td>{{ $kdo->silinder }}</td>
                                                <td>{{ $kdo->tahun }}</td>
                                                <td>{{ $kdo->no_polisi }}</td>
                                                <td>{{ $kdo->usia }}</td>
                                                <td>{{ $kdo->pemegang }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Sub Rincian Objek belum Tersedia.
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
