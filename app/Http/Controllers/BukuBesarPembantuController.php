<?php

namespace App\Http\Controllers;

use App\Models\Pajak;
use App\Models\RincianNota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BukuRincianObjek;

class BukuBesarPembantuController extends Controller
{
    private function getSortedData()
    {
        $subRincianObjekDanSubKegiatan = BukuRincianObjek::with([
            'anggaranRekening.subRincianObjek.rincianObjek.objek.jenis.kelompok.akun',
            'anggaranRekening.anggaranSubKegiatan.subKegiatan.kegiatan.program.bidangUrusan.urusan'
        ])->get();

        $rincianNota = RincianNota::with('notaPencairanDana.sub_kegiatan.kegiatan.program.bidangUrusan.urusan')->get();
        $pajak = Pajak::all();

        $data = collect();
        $data = $data->merge($rincianNota);
        $data = $data->merge($subRincianObjekDanSubKegiatan);

        $pajak->each(function ($item) {
            $item->pencairan = $item->penyetoran;
            $item->gu = $item->pemotongan;
        });
        $data = $data->merge($pajak);

        $sortedData = $data->sortBy('tanggal')->values();

        $saldo = 0;
        foreach ($sortedData as $item) {
            $debet = $item->pencairan ?? 0;
            $kredit = $item->gu ?? 0;
            $saldo += $debet - $kredit;
            $item->saldo = $saldo;

            if (isset($item->notaPencairanDana)) {
                $item->uraian = 'Nota Pencairan Dana(NPD)';
            } else {
                $item->uraian = $item->uraian ?? 'Uraian Tidak Diketahui';
            }
        }

        return $sortedData;
    }

    public function index()
    {
        $sortedData = $this->getSortedData();
        return view('buku.bbp', compact('sortedData'));
    }

    public function print()
    {
        // $sortedData = $this->getSortedData();
        // return view('pdf.bbp', compact('sortedData'));
        $sortedData = $this->getSortedData();
        $pdf = Pdf::loadView('pdf.bbp', ['sortedData' => $sortedData]);
        // return $pdf->download('Buku_Besar_Pembantu.pdf');
        return $pdf->stream();
    }
}
