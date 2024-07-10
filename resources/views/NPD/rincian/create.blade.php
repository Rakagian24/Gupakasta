@extends('layouts.main')
@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Rincian Nota Pencairan Dana</h4>
                            </div>
                            <div class="header-action">
                            </div>
                        </div>
                        <form method="post" action="/npd/nota_pencairan_dana">
                            @csrf
                            <input type="hidden" name="npd_id" value="{{ $notaPencairanDana->id }}">
                            <div class="card-body">
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item">PPTK : {{ $notaPencairanDana->pptk }}</li>
                                    <li class="list-group-item">Program : </li>
                                    <li class="list-group-item">Kegiatan : </li>
                                    <li class="list-group-item">Sub Kegiatan : </li>
                                    <li class="list-group-item">Tahun Anggaran: </li>
                                    <li class="list-group-item">Nomer: </li>
                                </ul>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Anggaran</span>
                                    </div>
                                    <input type="text" id="anggaran_formatted" class="form-control"
                                        placeholder="Anggaran" aria-label="Anggaran" aria-describedby="basic-addon1"
                                        value="{{ $totalAnggaran }}" required>
                                    <input type="hidden" id="anggaran" name="anggaran" value="{{ old('anggaran') }}">
                                    @error('anggaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Akumulasi Sebelumnya</span>
                                    </div>
                                    <input type="text" id="akumulasi_formatted" class="form-control"
                                        placeholder="Akumulasi Sebelumnya" aria-label="Akumulasi Sebelumnya"
                                        aria-describedby="basic-addon1" required>
                                    <input type="hidden" id="akumulasi_sebelumnya" name="akumulasi_sebelumnya"
                                        value="{{ old('akumulasi_sebelumnya') }}">
                                    @error('akumulasi_sebelumnya')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Pencairan Saat Ini</span>
                                    </div>
                                    <input type="text" id="pencairan_formatted" class="form-control"
                                        placeholder="Pencairan Saat Ini" aria-label="Pencairan Saat Ini"
                                        aria-describedby="basic-addon1" required>
                                    <input type="hidden" id="pencairan" name="pencairan" value="{{ old('pencairan') }}">
                                    @error('pencairan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Sisa Anggaran</span>
                                    </div>
                                    <input type="text" id="sisa_anggaran_formatted" class="form-control"
                                        placeholder="Sisa Anggaran" aria-label="Sisa Anggaran"
                                        aria-describedby="basic-addon1" required value="{{ $totalAnggaran }}">
                                    <input type="hidden" id="sisa_anggaran" name="sisa_anggaran"
                                        value="{{ old('sisa_anggaran'), $totalAnggaran }}">
                                    @error('sisa_anggaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="/npd/rincian_nota" class="btn bg-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
