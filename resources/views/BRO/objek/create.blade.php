@extends('layouts.main')
@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Buku Rincian Objek</h4>
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
                        <form method="post" action="/bro/objek">
                            @csrf
                            <div class="card-body">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">SKPD</span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('PPTK')
                                            is-invalid
                                        @enderror"
                                        name="SKPD" placeholder="Satuan Kerja Perangkat Daerah"
                                        value="Dinas Perumahan dan Kawasan Permukiman"
                                        aria-label="Satuan Kerja Perangkat Daerah" aria-describedby="basic-addon1" required
                                        autofocus value="{{ old('SKPD') }}">
                                    @error('SKPD')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kode Rekening</label>
                                    <select class="form-control mb-3 choicesjs" name="kode_sub_rincian_objek"
                                        id="kode_rekening_select">
                                        @foreach ($subrincianobjeks as $sro)
                                            <option value="{{ $sro->id }}"
                                                data-kode="{{ $sro->kode_sub_rincian_objek }}">
                                                {{ $sro->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.{{ $sro->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.{{ $sro->rincianObjek->objek->jenis->kode_jenis }}.{{ $sro->rincianObjek->objek->kode_objek }}.{{ $sro->rincianObjek->kode_rincian_objek }}.{{ $sro->kode_sub_rincian_objek }}
                                                | {{ $sro->nama_sub_rincian_objek }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Jumlah Anggaran</span>
                                    </div>
                                    <input type="text" id="jumlah"
                                        class="form-control @error('JumlahAnggaran')
                                            is-invalid
                                        @enderror"
                                        placeholder="Jumlah Anggaran" aria-label="Jumlah Anggaran" name="jumlah"
                                        aria-describedby="basic-addon1" required value="{{ old('JumlahAnggaran') }}">
                                    @error('JumlahAnggaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                                        aria-describedby="basic-addon1" required value="{{ old('tahun') }}">
                                    @error('tahun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="/bro/objek" class="btn bg-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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

        document.getElementById('jumlah').addEventListener('keyup', function(e) {
            this.value = formatRupiah(this.value, 'Rp ');
        });
    </script>
    </script>
@endsection
