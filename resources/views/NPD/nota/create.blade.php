@extends('layouts.main')
@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Nota Pencairan Dana</h4>
                            </div>
                            <div class="header-action">
                                <i data-toggle="collapse" data-target="#input-group-1" aria-expanded="false">
                                    <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </i>
                            </div>
                        </div>
                        <form method="post" action="/npd/nota">
                            @csrf
                            <div class="card-body">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">PPTK</span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('PPTK')
                                            is-invalid
                                        @enderror"
                                        name="PPTK" placeholder="Pejabat Pelaksana Teknis Kegiatan"
                                        aria-label="Pejabat Pelaksana Teknis Kegiatan" aria-describedby="basic-addon1"
                                        required autofocus value="{{ old('PPTK') }}">
                                    @error('PPTK')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Program</label>
                                    <select class="form-control mb-3" name="kode_program" id="programSelect">
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->kode_program }}">
                                                {{ $program->bidangUrusan->urusan->kode_urusan }}.{{ $program->bidangUrusan->kode_bidang_urusan }}.{{ $program->kode_program }}
                                                | {{ $program->nama_program }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <select class="form-control mb-3" name="kode_kegiatan" id="kegiatanSelect">
                                        @foreach ($kegiatans as $kegiatan)
                                            <option value="{{ $kegiatan->kode_kegiatan }}"
                                                data-program="{{ $kegiatan->kode_program }}">
                                                {{ $kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $kegiatan->program->kode_program }}.{{ $kegiatan->kode_kegiatan }}
                                                | {{ $kegiatan->nama_kegiatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Kegiatan</label>
                                    <select class="form-control mb-3" name="kode_sub_kegiatan" id="subKegiatanSelect">
                                        @foreach ($subkegiatans as $subkegiatan)
                                            <option value="{{ $subkegiatan->id }}"
                                                data-kegiatan="{{ $subkegiatan->kode_kegiatan }}"
                                                data-program="{{ $subkegiatan->kode_program }}">
                                                {{ $subkegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $subkegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $subkegiatan->kegiatan->program->kode_program }}.{{ $subkegiatan->kegiatan->kode_kegiatan }}.{{ $subkegiatan->kode_sub_kegiatan }}
                                                | {{ $subkegiatan->nama_sub_kegiatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Tahun Anggaran</span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('Tahun')
                                            is-invalid
                                        @enderror"
                                        placeholder="Tahun Anggaran" name="Tahun" aria-label="Tahun Anggaran"
                                        aria-describedby="basic-addon1" required value="{{ old('Tahun') }}">
                                    @error('Tahun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Nomer</span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('Nomer')
                                            is-invalid
                                        @enderror"
                                        placeholder="Nomer" aria-label="Nomer" name="Nomer"
                                        aria-describedby="basic-addon1" required value="{{ old('Nomer') }}">
                                    @error('Nomer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="/npd/nota" class="btn bg-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const subKegiatanSelect = document.getElementById('subKegiatanSelect');
            const kegiatanSelect = document.getElementById('kegiatanSelect');
            const programSelect = document.getElementById('programSelect');

            subKegiatanSelect.addEventListener('change', function() {
                const selectedSubKegiatanOption = subKegiatanSelect.options[subKegiatanSelect
                    .selectedIndex];
                const relatedKegiatan = selectedSubKegiatanOption.getAttribute('data-kegiatan');
                const relatedProgram = selectedSubKegiatanOption.getAttribute('data-program');

                if (relatedKegiatan) {
                    kegiatanSelect.value = relatedKegiatan;
                }

                if (relatedProgram) {
                    programSelect.value = relatedProgram;
                }
            });
        });
    </script>
@endsection
