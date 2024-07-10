@extends('layouts.main')
@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Anggaran Sub Kegiatan</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('sub_kegiatan.edit', $anggaranSubKegiatan->id, $anggaranKegiatanId) }} --}}
                            </div>
                        </div>
                        <form method="post" action="{{ route('sub_kegiatan.update', $anggaranSubKegiatan->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="anggaran_kegiatan_id"
                                value="{{ $anggaranSubKegiatan->anggaran_kegiatan_id }}">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Sub Kegiatan</label>
                                    <select class="form-control mb-3" name="kode_sub_kegiatan" id="kodeSubKegiatanSelect">
                                        @foreach ($subKegiatans as $subKegiatan)
                                            <option value="{{ $subKegiatan->id }}"
                                                {{ $anggaranSubKegiatan->kode_sub_kegiatan == $subKegiatan->kode_sub_kegiatan ? 'selected' : '' }}>
                                                {{ $subKegiatan->kode_sub_kegiatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Sub Kegiatan</label>
                                    <select class="form-control mb-3" id="namaSubKegiatanSelect">
                                        @foreach ($subKegiatans as $subKegiatan)
                                            <option value="{{ $subKegiatan->kode_sub_kegiatan }}"
                                                {{ $anggaranSubKegiatan->kode_sub_kegiatan == $subKegiatan->kode_sub_kegiatan ? 'selected' : '' }}>
                                                {{ $subKegiatan->nama_sub_kegiatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <a href="{{ url()->previous() }}" class="btn bg-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
