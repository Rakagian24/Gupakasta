@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Buku Rincian Objek</h4>
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
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">SKPD :</li>
                                <li class="list-group-item">Kode Rekening</li>
                                <li class="list-group-item">Nama Kode Rekening : </li>
                                <li class="list-group-item">Jumlah Anggaran(RKA) : </li>
                                <li class="list-group-item">Tahun Anggaran 2024</li>
                            </ul>
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="/formbro" class="btn btn-sm bg-primary"><i class="ri-add-fill"><span
                                            class="pl-1">Add
                                            New</span></i></a>
                            </span>
                            <div class="table-responsive">
                                <table id="datatable-1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No. BKU</th>
                                            <th>No. Bukti</th>
                                            <th>Uraian</th>
                                            <th>LS</th>
                                            <th>UP/GU/TU</th>
                                            <th class="text-right">Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2011/04/25</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td class="text-right">$320,800</td>
                                        </tr>
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
