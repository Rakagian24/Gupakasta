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

                            </div>
                        </div>
                        <form method="post" action="{{ route('rekening.update', $anggaranRekening->id) }}">
                            @csrf
                            @method('PUT')
                            {{-- <input type="hidden" name="anggaran_sub_kegiatan_id" value="{{ $anggaranSubKegiatanId }}"> --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Rekening</label>
                                    <select class="form-control mb-3" name="kode_sub_rincian_objek" id="kodeRekeningSelect">
                                        @foreach ($subRincianObjeks as $sro)
                                            <option value="{{ $sro->id }}"
                                                {{ $sro->id == $anggaranRekening->kode_sub_rincian_objek ? 'selected' : '' }}>
                                                {{ $sro->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.{{ $sro->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.{{ $sro->rincianObjek->objek->jenis->kode_jenis }}.{{ $sro->rincianObjek->objek->kode_objek }}.{{ $sro->rincianObjek->kode_rincian_objek }}.{{ $sro->kode_sub_rincian_objek }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Rekening</label>
                                    <select class="form-control mb-3 choicesjs" id="namaRekeningSelect">
                                        @foreach ($subRincianObjeks as $sro)
                                            <option value="{{ $sro->id }}"
                                                {{ $sro->id == $anggaranRekening->kode_sub_rincian_objek ? 'selected' : '' }}>
                                                {{ $sro->nama_sub_rincian_objek }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Anggaran Field -->
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Anggaran</span>
                                    </div>
                                    <input type="text" id="anggaran_formatted" class="form-control"
                                        placeholder="Anggaran" aria-label="Anggaran" aria-describedby="basic-addon1"
                                        value="{{ number_format($anggaranRekening->anggaran, 0, ',', '.') }}" required>
                                    <input type="hidden" id="anggaran" name="anggaran"
                                        value="{{ $anggaranRekening->anggaran }}">
                                    @error('anggaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- SPJ Lalu Field -->
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">s.d SPJ Lalu</span>
                                    </div>
                                    <input type="text" id="spj_lalu_formatted" class="form-control"
                                        placeholder="s.d SPJ Lalu" aria-label="s.d SPJ Lalu" aria-describedby="basic-addon1"
                                        value="{{ number_format($anggaranRekening->spj_lalu, 0, ',', '.') }}">
                                    <input type="hidden" id="spj_lalu" name="spj_lalu"
                                        value="{{ $anggaranRekening->spj_lalu }}">
                                    @error('spj_lalu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- LS Field -->
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">LS</span>
                                    </div>
                                    <input type="text" id="ls_formatted" class="form-control" placeholder="LS"
                                        aria-label="LS" aria-describedby="basic-addon1"
                                        value="{{ number_format($anggaranRekening->ls, 0, ',', '.') }}">
                                    <input type="hidden" id="ls" name="ls"
                                        value="{{ $anggaranRekening->ls }}">
                                    @error('ls')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- GU Field -->
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">GU</span>
                                    </div>
                                    <input type="text" id="gu_formatted" class="form-control" placeholder="GU"
                                        aria-label="GU" aria-describedby="basic-addon1"
                                        value="{{ number_format($anggaranRekening->gu, 0, ',', '.') }}">
                                    <input type="hidden" id="gu" name="gu"
                                        value="{{ $anggaranRekening->gu }}">
                                    @error('gu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- SPJ Ini Field -->
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">s.d SPJ Ini</span>
                                    </div>
                                    <input type="text" id="spj_ini_formatted" class="form-control"
                                        placeholder="s.d SPJ Ini" aria-label="s.d SPJ Ini" aria-describedby="basic-addon1"
                                        value="{{ number_format($anggaranRekening->spj_ini, 0, ',', '.') }}">
                                    <input type="hidden" id="spj_ini" name="spj_ini"
                                        value="{{ $anggaranRekening->spj_ini }}">
                                    @error('spj_ini')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Sisa Anggaran Field -->
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Sisa Anggaran</span>
                                    </div>
                                    <input type="text" id="sisa_anggaran" class="form-control"
                                        placeholder="Sisa Anggaran" aria-label="Sisa Anggaran"
                                        aria-describedby="basic-addon1" readonly
                                        value="{{ number_format($anggaranRekening->sisa_anggaran, 0, ',', '.') }}">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kodeRekeningSelect = document.getElementById('kodeRekeningSelect');
            const namaRekeningSelect = document.getElementById('namaRekeningSelect');

            const subRincianObjekMap = {};
            @foreach ($subRincianObjeks as $subRincianObjek)
                subRincianObjekMap['{{ $subRincianObjek->id }}'] =
                    '{{ $subRincianObjek->nama_sub_rincian_objek }}';
            @endforeach

            function updateNamaRekening() {
                const selectedKode = kodeRekeningSelect.value;
                namaRekeningSelect.value = selectedKode;
            }

            function updateKodeRekening() {
                const selectedNama = namaRekeningSelect.value;
                kodeRekeningSelect.value = selectedNama;
            }

            kodeRekeningSelect.addEventListener('change', updateNamaRekening);
            namaRekeningSelect.addEventListener('change', updateKodeRekening);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk menghapus format Rupiah
            function parseRupiah(rupiah) {
                return parseFloat(rupiah.replace(/[^0-9,-]+/g, '').replace(',', '.')) || 0;
            }

            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
            }

            const fields = ['anggaran', 'spj_lalu', 'ls', 'gu', 'spj_ini'];

            fields.forEach(field => {
                const formattedInput = document.getElementById(`${field}_formatted`);
                const hiddenInput = document.getElementById(field);

                // Event listener untuk input yang diformat
                formattedInput.addEventListener('input', function() {
                    const parsedValue = parseRupiah(formattedInput.value);
                    hiddenInput.value = parsedValue;
                    formattedInput.value = formatRupiah(parsedValue.toString(), 'Rp ');
                    calculateSisaAnggaran(); // Update sisa anggaran saat nilai berubah
                });

                // Set initial value for formatted input
                const initialValue = parseRupiah(formattedInput.value);
                formattedInput.value = formatRupiah(initialValue.toString(), 'Rp ');
                hiddenInput.value = initialValue;
            });

            const calculateSisaAnggaran = () => {
                const anggaran = parseRupiah(document.getElementById('anggaran_formatted').value);
                const spjLalu = parseRupiah(document.getElementById('spj_lalu_formatted').value);
                const ls = parseRupiah(document.getElementById('ls_formatted').value);
                const gu = parseRupiah(document.getElementById('gu_formatted').value);
                const spjIni = parseRupiah(document.getElementById('spj_ini_formatted').value);
                const sisaAnggaran = anggaran - spjLalu - ls - gu - spjIni;
                document.getElementById('sisa_anggaran').value = formatRupiah(sisaAnggaran.toString(), 'Rp ');
            };

            calculateSisaAnggaran();
        });
    </script>
@endsection
