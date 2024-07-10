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
                                {{-- {{ Breadcrumbs::render('rekening.create') }} --}}

                            </div>
                        </div>
                        <form method="post" action="/buku_rincian_objek">
                            @csrf
                            <input type="hidden" name="anggaran_rekening_id" value="{{ $anggaranRekening->id }}">
                            <div class="card-body">
                                @if ($anggaranRekening)
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="list-group-item d-flex">
                                            <span class="flex-shrink-0" style="width: 250px;">SKPD :</span>
                                            <span>Dinas Perumahan dan Kawasan Permukiman</span>
                                        </li>
                                        <li class="list-group-item d-flex">
                                            <span class="flex-shrink-0" style="width: 250px;">Kode Rekening :</span>
                                            <span>
                                                {{ $anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.
                                                {{ $anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.
                                                {{ $anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kode_jenis }}.
                                                {{ $anggaranRekening->subRincianObjek->rincianObjek->objek->kode_objek }}.
                                                {{ $anggaranRekening->subRincianObjek->rincianObjek->kode_rincian_objek }}.
                                                {{ $anggaranRekening->subRincianObjek->kode_sub_rincian_objek }}
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex">
                                            <span class="flex-shrink-0" style="width: 250px;">Nama Rekening :</span>
                                            <span>{{ $anggaranRekening->subRincianObjek->nama_sub_rincian_objek }}</span>
                                        </li>
                                        <li class="list-group-item d-flex">
                                            <span class="flex-shrink-0" style="width: 250px;">Jumlah Anggaran (RKA) :</span>
                                            <span>{{ formatRupiah($anggaranRekening->sisa_anggaran) }}</span>
                                        </li>
                                        <li class="list-group-item d-flex">
                                            <span class="flex-shrink-0" style="width: 250px;">Tahun Anggaran :</span>
                                            <span>{{ $anggaranRekening->created_at->year }}</span>
                                        </li>
                                    </ul>
                                @else
                                    <p>Tidak ditemukan data untuk ID rekening anggaran yang diberikan.</p>
                                @endif

                                <div class="form-group">
                                    <label for="exampleInputdate">Tanggal</label>
                                    <input type="date" class="form-control" id="exampleInputdate" value=""
                                        name="tanggal">
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">No Bukti</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="No Bukti" name="no_bukti"
                                        aria-label="No Bukti" aria-describedby="basic-addon1" required
                                        value="{{ old('no_bukti') }}">
                                    @error('no_bukti')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Uraian</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Uraian" name="uraian"
                                        aria-label="Uraian" aria-describedby="basic-addon1" required
                                        value="{{ old('uraian') }}">
                                    @error('uraian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">LS</span>
                                    </div>
                                    <input type="text" id="ls_formatted" class="form-control" placeholder="LS"
                                        aria-label="LS" aria-describedby="basic-addon1">
                                    <input type="hidden" id="ls" name="ls" value="{{ old('ls') }}">
                                    @error('ls')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">UP/GU/TU</span>
                                    </div>
                                    <input type="text" id="gu_formatted" class="form-control" placeholder="UP/GU/TU"
                                        aria-label="UP/GU/TU" aria-describedby="basic-addon1">
                                    <input type="hidden" id="gu" name="gu" value="{{ old('gu') }}">
                                    @error('gu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- LS Field -->
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Saldo</span>
                                    </div>
                                    <input type="text" id="saldo_formatted" class="form-control" placeholder="Saldo"
                                        aria-label="Saldo" aria-describedby="basic-addon1">
                                    <input type="hidden" id="saldo" name="saldo" value="{{ old('saldo') }}">
                                    @error('saldo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{ route('buku_rincian_objek.show', $anggaranRekening->id) }}"
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
            const formatToRupiah = (number) => {
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                });
                return formatter.format(number);
            };

            const formatInput = (inputElement, hiddenElement) => {
                inputElement.addEventListener('input', function() {
                    let numericValue = this.value.replace(/[^0-9]/g, '');
                    hiddenElement.value = numericValue;

                    this.value = formatToRupiah(numericValue);
                });

                inputElement.addEventListener('focus', function() {
                    let numericValue = hiddenElement.value;
                    this.value = numericValue;
                });

                inputElement.addEventListener('blur', function() {
                    let numericValue = hiddenElement.value;
                    this.value = formatToRupiah(numericValue);
                });
            };

            const lsInput = document.getElementById('ls_formatted');
            const lsHidden = document.getElementById('ls');
            const guInput = document.getElementById('gu_formatted');
            const guHidden = document.getElementById('gu');
            const saldoInput = document.getElementById('saldo_formatted');
            const saldoHidden = document.getElementById('saldo');

            formatInput(lsInput, lsHidden);
            formatInput(guInput, guHidden);
            formatInput(saldoInput, saldoHidden);
        });
    </script>
@endsection
