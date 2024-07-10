@extends('layouts.main')
@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Anggaran Sub Kegiatan</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('sub_kegiatan.create', $anggaranKegiatanId) }} --}}

                            </div>
                        </div>
                        <form method="post" action="/anggaran/sub_kegiatan">
                            @csrf
                            <input type="hidden" name="anggaran_kegiatan_id" value="{{ $anggaranKegiatanId }}">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Sub Kegiatan</label>
                                    <select class="form-control mb-3" name="kode_sub_kegiatan" id="kodeSubKegiatanSelect">
                                        @foreach ($subKegiatans as $subKegiatan)
                                            <option value="{{ $subKegiatan->id }}">
                                                {{ $subKegiatan->kegiatan->program->kode_program }}.{{ $subKegiatan->kegiatan->kode_kegiatan }}.{{ $subKegiatan->kode_sub_kegiatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Sub Kegiatan</label>
                                    <select class="form-control mb-3" id="namaSubKegiatanSelect">
                                        @foreach ($subKegiatans as $subKegiatan)
                                            <option value="{{ $subKegiatan->id }}">
                                                {{ $subKegiatan->nama_sub_kegiatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{ route('sub_kegiatan.index', ['anggaran_kegiatan_id' => $anggaranKegiatanId]) }}"
                                    class="btn bg-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kodeSubKegiatanSelect = document.getElementById('kodeSubKegiatanSelect');
            const namaSubKegiatanSelect = document.getElementById('namaSubKegiatanSelect');

            const subKegiatanMap = {};
            @foreach ($subKegiatans as $subKegiatan)
                subKegiatanMap['{{ $subKegiatan->kode_sub_kegiatan }}'] = '{{ $subKegiatan->nama_sub_kegiatan }}';
            @endforeach

            function updateNamaSubKegiatan() {
                const selectedKode = kodeSubKegiatanSelect.value;
                namaSubKegiatanSelect.value = selectedKode;
            }

            function updateKodeSubKegiatan() {
                const selectedNama = namaSubKegiatanSelect.value;
                kodeSubKegiatanSelect.value = selectedNama;
            }

            kodeSubKegiatanSelect.addEventListener('change', updateNamaSubKegiatan);
            namaSubKegiatanSelect.addEventListener('change', updateKodeSubKegiatan);
        });
    </script>
@endsection
