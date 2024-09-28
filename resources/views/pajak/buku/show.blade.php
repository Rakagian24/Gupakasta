@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Rincian Pajak</h4>
                            </div>
                            <div class="header-action">
                                {{-- {{ Breadcrumbs::render('rekening.index', $anggaranKegiatanId, $anggaranSubKegiatanId) }} --}}
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($bukuRincianObjek)
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Tanggal</span>
                                        <span>: {{ $bukuRincianObjek->tanggal }}</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">No. Bukti</span>
                                        <span>: {{ $bukuRincianObjek->no_bukti }}</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">Uraian</span>
                                        <span>: {{ $bukuRincianObjek->uraian }}</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="flex-shrink-0" style="width: 250px;">UP/GU/TU</span>
                                        <span>: {{ formatRupiah($bukuRincianObjek->gu) }}</span>
                                    </li>
                                </ul>
                            @else
                                <p>Tidak ditemukan data untuk ID Buku Rincian Objek yang diberikan.</p>
                            @endif
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="{{ route('pajak.bro.create', ['kode_bro' => $bukuRincianObjek->id]) }}"
                                    class="btn btn-sm bg-primary">
                                    <i class="ri-add-fill">
                                        <span class="pl-1">Add New</span>
                                    </i>
                                </a>
                            </span>
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Uraian</th>
                                            <th>Pemotongan</th>
                                            <th>Penyetoran</th>
                                            <th>Saldo</th>
                                            <th>Kode Biling</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pajak as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->tanggal }}</td>
                                                <td>{{ $p->uraian }}</td>
                                                <td>{{ formatRupiah($p->pemotongan) }}</td>
                                                <td>{{ formatRupiah($p->penyetoran) }}</td>
                                                <td class="saldo-cell"></td>
                                                <td>{{ $p->kode_biling }}</td>
                                                <td>
                                                    @if (!$p->pemotongan)
                                                        <button class="btn bg-primary-light btn-rounded btn-sm my-0"
                                                            onclick="addPemotongan({{ $p }})">Tambahkan
                                                            Pemotongan</button>
                                                    @endif
                                                    <a href="{{ route('bro.edit', $p->id) }}"
                                                        class="btn bg-info-light btn-rounded btn-sm my-0">Edit</a>
                                                    <form action="{{ route('bro.destroy', $p->id) }}" method="POST"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn bg-danger-light btn-rounded btn-sm"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">Data Rincian Pajak belum Tersedia.</div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Pemotongan Pajak -->
    <div class="modal fade bd-example-modal-xl" id="addPemotonganModal" tabindex="-1" role="dialog"
        aria-labelledby="addPemotonganModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="addPemotonganForm" method="POST" action="/pajak/buku">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPemotonganModalLabel">Pemotongan Pajak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="uraian">Uraian</label>
                            <input type="text" class="form-control" id="uraian" name="uraian" required>
                        </div>
                        <div class="form-group">
                            <label for="pemotongan_display">Pemotongan</label>
                            <input type="text" class="form-control" id="pemotongan_display" required>
                            <input type="hidden" id="pemotongan" name="pemotongan">
                        </div>
                        <input type="hidden" id="kode_bro" name="kode_bro">
                        <input type="hidden" id="tanggal" name="tanggal">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
            }).format(value);
        }

        function addPemotongan(pajak) {
            let uraian = pajak.uraian.replace('Diterima', 'Dikeluarkan');
            document.getElementById('uraian').value = uraian;
            document.getElementById('pemotongan_display').value = formatRupiah(pajak.penyetoran);
            document.getElementById('pemotongan').value = pajak.penyetoran;
            document.getElementById('kode_bro').value = {{ $bukuRincianObjek->id }};
            document.getElementById('tanggal').value = pajak.tanggal;

            $('#addPemotonganModal').modal('show');
        }

        // Calculate saldo and update table
        document.addEventListener('DOMContentLoaded', function() {
            let saldo = 0;
            document.querySelectorAll('#datatable-1 tbody tr').forEach(function(row) {
                let pemotongan = parseInt(row.children[3].innerText.replace(/[^\d]/g, '')) || 0;
                let penyetoran = parseInt(row.children[4].innerText.replace(/[^\d]/g, '')) || 0;

                saldo += penyetoran - pemotongan;

                row.querySelector('.saldo-cell').innerText = formatRupiah(saldo);
            });
        });
    </script>
@endsection
