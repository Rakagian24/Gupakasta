@extends('layouts.main')
@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Pajak</h4>
                            </div>
                            <div class="header-action">
                            </div>
                        </div>
                        <form method="post" action="{{ route('bro.update', $pajak->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="kode_bro" value="{{ $pajak->kode_bro }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputdate">Tanggal</label>
                                    <input type="date" class="form-control" id="exampleInputdate" name="tanggal"
                                        value="{{ $pajak->tanggal }}">
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Uraian</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Uraian" name="uraian"
                                        aria-label="Uraian" aria-describedby="basic-addon1" required
                                        value="{{ $pajak->uraian }}">
                                    @error('uraian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Pemotongan</span>
                                    </div>
                                    <input type="text" id="pemotongan_formatted" class="form-control"
                                        placeholder="Pemotongan" aria-label="Pemotongan" aria-describedby="basic-addon1"
                                        value="{{ number_format($pajak->pemotongan, 0, ',', '.') }}">
                                    <input type="hidden" id="pemotongan" name="pemotongan"
                                        value="{{ $pajak->pemotongan }}">
                                    @error('pemotongan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Penyetoran</span>
                                    </div>
                                    <input type="text" id="penyetoran_formatted" class="form-control"
                                        placeholder="Penyetoran" aria-label="Penyetoran" aria-describedby="basic-addon1"
                                        value="{{ number_format($pajak->penyetoran, 0, ',', '.') }}">
                                    <input type="hidden" id="penyetoran" name="penyetoran"
                                        value="{{ $pajak->penyetoran }}">
                                    @error('penyetoran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Kode Biling</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Kode Biling" name="kode_biling"
                                        aria-label="Kode Biling" aria-describedby="basic-addon1" required
                                        value="{{ $pajak->kode_biling }}">
                                    @error('kode_biling')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <a href="/pajak" class="btn bg-danger">Cancel</a>
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

                    if (numericValue) {
                        this.value = formatToRupiah(numericValue);
                    } else {
                        this.value = '';
                    }
                });

                inputElement.addEventListener('focus', function() {
                    let numericValue = hiddenElement.value;
                    this.value = numericValue;
                });

                inputElement.addEventListener('blur', function() {
                    let numericValue = hiddenElement.value;
                    if (numericValue) {
                        this.value = formatToRupiah(numericValue);
                    }
                });
            };

            const pemotonganInput = document.getElementById('pemotongan_formatted');
            const pemotonganHidden = document.getElementById('pemotongan');
            const penyetoranInput = document.getElementById('penyetoran_formatted');
            const penyetoranHidden = document.getElementById('penyetoran');

            formatInput(pemotonganInput, pemotonganHidden);
            formatInput(penyetoranInput, penyetoranHidden);
        });
    </script>
@endsection
