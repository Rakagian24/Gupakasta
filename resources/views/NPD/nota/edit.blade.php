@extends('layouts.main')
@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Nota Pencairan Dana</h4>
                            </div>
                            <div class="header-action">

                            </div>
                        </div>
                        <form method="post" action="/npd/nota_pencairan_dana/{{ $notaPencairanDana->id }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">PPTK</span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('pptk')
                                            is-invalid
                                        @enderror"
                                        name="pptk" placeholder="Pejabat Pelaksana Teknis Kegiatan"
                                        aria-label="Pejabat Pelaksana Teknis Kegiatan" aria-describedby="basic-addon1"
                                        required autofocus value="{{ old('pptk', $notaPencairanDana->pptk) }}">
                                    @error('pptk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Program</label>
                                    <select class="form-control mb-3" name="kode_program" id="programSelect" disabled>
                                        @foreach ($subKegiatan as $subkegiatan)
                                            <option value="{{ $subkegiatan->kegiatan->program->kode_program }}"
                                                @if ($subkegiatan->id == $notaPencairanDana->kode_sub_kegiatan) selected @endif>
                                                {{ $subkegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $subkegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $subkegiatan->kegiatan->program->kode_program }}
                                                | {{ $subkegiatan->kegiatan->program->nama_program }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <select class="form-control mb-3" name="kode_kegiatan" id="kegiatanSelect" disabled>
                                        @foreach ($subKegiatan as $subkegiatan)
                                            <option value="{{ $subkegiatan->kegiatan->kode_kegiatan }}"
                                                data-program="{{ $subkegiatan->kegiatan->kode_program }}"
                                                @if ($subkegiatan->id == $notaPencairanDana->kode_sub_kegiatan) selected @endif>
                                                {{ $subkegiatan->kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $subkegiatan->kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $subkegiatan->kegiatan->program->kode_program }}.{{ $subkegiatan->kegiatan->kode_kegiatan }}
                                                | {{ $subkegiatan->kegiatan->nama_kegiatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Kegiatan</label>
                                    <select class="form-control mb-3" name="kode_sub_kegiatan" id="subKegiatanSelect">
                                        @foreach ($subKegiatan as $subkegiatan)
                                            <option value="{{ $subkegiatan->id }}"
                                                data-kegiatan="{{ $subkegiatan->kegiatan->kode_kegiatan }}"
                                                data-program="{{ $subkegiatan->kegiatan->kode_program }}"
                                                @if ($subkegiatan->id == $notaPencairanDana->kode_sub_kegiatan) selected @endif>
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
                                        class="form-control @error('tahun')
                                            is-invalid
                                        @enderror"
                                        placeholder="Tahun Anggaran" name="tahun" aria-label="Tahun Anggaran"
                                        aria-describedby="basic-addon1" required
                                        value="{{ old('tahun', $notaPencairanDana->tahun) }}">
                                    @error('tahun')
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
                                        class="form-control @error('nomer')
                                            is-invalid
                                        @enderror"
                                        placeholder="Nomer" aria-label="Nomer" name="nomer"
                                        aria-describedby="basic-addon1" required
                                        value="{{ old('nomer', $notaPencairanDana->nomer) }}">
                                    @error('nomer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <a href="/npd/nota_pencairan_dana" class="btn bg-danger">Cancel</a>
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
