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
                        <form method="post" action="/npd/rincian_nota" id="rincian-form">
                            @csrf
                            <input type="hidden" name="npd_id" value="{{ $notaPencairanDana->id }}">
                            <div class="card-body">
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item">PPTK : {{ $notaPencairanDana->pptk }}</li>
                                    <li class="list-group-item">Program :
                                        {{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}
                                        | {{ $notaPencairanDana->sub_kegiatan->kegiatan->program->nama_program }}
                                    </li>
                                    <li class="list-group-item">Kegiatan :
                                        {{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->kode_program }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->kode_kegiatan }}
                                    </li>
                                    <li class="list-group-item">Sub Kegiatan :
                                        {{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->program->kode_program }}.{{ $notaPencairanDana->sub_kegiatan->kegiatan->kode_kegiatan }}.{{ $notaPencairanDana->sub_kegiatan->kode_sub_kegiatan }}
                                    </li>
                                    <li class="list-group-item">Tahun Anggaran : {{ $notaPencairanDana->tahun }}</li>
                                    <li class="list-group-item">Nomer : {{ $notaPencairanDana->nomer }} </li>
                                </ul>
                                <div class="form-group">
                                    <label for="exampleInputdate">Tanggal</label>
                                    <input type="date" class="form-control" id="exampleInputdate" value=""
                                        name="tanggal">
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Anggaran</span>
                                    </div>
                                    <input type="text" id="anggaran_formatted" class="form-control"
                                        placeholder="Anggaran" aria-label="Anggaran" aria-describedby="basic-addon1"
                                        value="{{ number_format($totalAnggaran, 0, ',', '.') }}" required>
                                    <input type="hidden" id="anggaran" name="anggaran" value="{{ $totalAnggaran }}">
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
                                        aria-describedby="basic-addon1">
                                    <input type="hidden" id="akumulasi" name="akumulasi_sebelumnya">
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
                                    <input type="hidden" id="pencairan" name="pencairan">
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
                                        aria-describedby="basic-addon1" readonly>
                                    <input type="hidden" id="sisa_anggaran" name="sisa_anggaran">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formatRupiah = (number) => {
                return number.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });
            };

            const parseRupiah = (string) => {
                return parseInt(string.replace(/[Rp.]/g, '')) || 0;
            };

            const anggaranInput = document.getElementById('anggaran_formatted');
            const akumulasiInput = document.getElementById('akumulasi_formatted');
            const pencairanInput = document.getElementById('pencairan_formatted');
            const sisaAnggaranInput = document.getElementById('sisa_anggaran_formatted');

            const anggaranHiddenInput = document.getElementById('anggaran');
            const akumulasiHiddenInput = document.getElementById('akumulasi');
            const pencairanHiddenInput = document.getElementById('pencairan');
            const sisaAnggaranHiddenInput = document.getElementById('sisa_anggaran');

            const updateSisaAnggaran = () => {
                const anggaran = parseRupiah(anggaranInput.value);
                const pencairan = parseRupiah(pencairanInput.value);
                const sisaAnggaran = anggaran - pencairan;
                sisaAnggaranInput.value = formatRupiah(sisaAnggaran);
                sisaAnggaranHiddenInput.value = sisaAnggaran;
            };

            const formatOnInput = (event) => {
                const input = event.target;
                const value = parseRupiah(input.value);
                input.value = formatRupiah(value);

                switch (input.id) {
                    case 'anggaran_formatted':
                        anggaranHiddenInput.value = value;
                        break;
                    case 'akumulasi_formatted':
                        akumulasiHiddenInput.value = value;
                        break;
                    case 'pencairan_formatted':
                        pencairanHiddenInput.value = value;
                        updateSisaAnggaran();
                        break;
                }
            };

            anggaranInput.addEventListener('input', formatOnInput);
            akumulasiInput.addEventListener('input', formatOnInput);
            pencairanInput.addEventListener('input', (event) => {
                formatOnInput(event);
                updateSisaAnggaran();
            });

            // Initialize the formatted values
            anggaranInput.value = formatRupiah(parseRupiah(anggaranInput.value));
            akumulasiInput.value = formatRupiah(parseRupiah(akumulasiInput.value));
            pencairanInput.value = formatRupiah(parseRupiah(pencairanInput.value));
            updateSisaAnggaran();

            // Convert formatted values to numeric before form submission
            document.getElementById('rincian-form').addEventListener('submit', function() {
                anggaranHiddenInput.value = parseRupiah(anggaranInput.value);
                akumulasiHiddenInput.value = parseRupiah(akumulasiInput.value);
                pencairanHiddenInput.value = parseRupiah(pencairanInput.value);
                sisaAnggaranHiddenInput.value = parseRupiah(sisaAnggaranInput.value);
            });
        });
    </script>
@endsection
