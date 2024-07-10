@extends('layouts.main')
@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Anggaran Kegiatan</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('kegiatan.edit', $anggaranKegiatan->id) }} --}}
                            </div>
                        </div>
                        <form method="post" action="{{ route('kegiatan.update', $anggaranKegiatan->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Kegiatan</label>
                                    <select class="form-control mb-3" name="kode_kegiatan" id="kodeKegiatanSelect">
                                        @foreach ($kegiatans as $kegiatan)
                                            <option value="{{ $kegiatan->kode_kegiatan }}"
                                                {{ $kegiatan->kode_kegiatan == $anggaranKegiatan->kode_kegiatan ? 'selected' : '' }}>
                                                {{ $kegiatan->program->bidangUrusan->urusan->kode_urusan }}.{{ $kegiatan->program->bidangUrusan->kode_bidang_urusan }}.{{ $kegiatan->program->kode_program }}.{{ $kegiatan->kode_kegiatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <select class="form-control mb-3" id="namaKegiatanSelect">
                                        @foreach ($kegiatans as $kegiatan)
                                            <option value="{{ $kegiatan->kode_kegiatan }}"
                                                {{ $kegiatan->kode_kegiatan == $anggaranKegiatan->kode_kegiatan ? 'selected' : '' }}>
                                                {{ $kegiatan->nama_kegiatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="/anggaran/kegiatan" class="btn bg-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kodeKegiatanSelect = document.getElementById('kodeKegiatanSelect');
            const namaKegiatanSelect = document.getElementById('namaKegiatanSelect');

            const kegiatanMap = {};
            @foreach ($kegiatans as $kegiatan)
                kegiatanMap['{{ $kegiatan->kode_kegiatan }}'] = '{{ $kegiatan->nama_kegiatan }}';
            @endforeach

            function updateNamaKegiatan() {
                const selectedKode = kodeKegiatanSelect.value;
                namaKegiatanSelect.value = selectedKode;
            }

            function updateKodeKegiatan() {
                const selectedNama = namaKegiatanSelect.value;
                kodeKegiatanSelect.value = selectedNama;
            }

            kodeKegiatanSelect.addEventListener('change', updateNamaKegiatan);
            namaKegiatanSelect.addEventListener('change', updateKodeKegiatan);
        });
    </script>
@endsection
