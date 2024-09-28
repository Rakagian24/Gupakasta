<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Pajak;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\RincianNota;
use Illuminate\Http\Request;
use App\Models\BukuRincianObjek;
use App\Models\BukuBesarPembantu;
use App\Models\NotaPencairanDana;


class BukuBesarPembantuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     // Ambil data dari database dengan relasi yang diperlukan
    //     $subRincianObjekDanSubKegiatan = BukuRincianObjek::with([
    //         'anggaranRekening.subRincianObjek.rincianObjek.objek.jenis.kelompok.akun',
    //         'anggaranRekening.anggaranSubKegiatan.subKegiatan.kegiatan.program.bidangUrusan.urusan'
    //     ])->get();

    //     $rincianNota = RincianNota::with('notaPencairanDana.sub_kegiatan.kegiatan.program.bidangUrusan.urusan')->get();
    //     $pajak = Pajak::all();

    //     // Gabungkan data ke dalam satu koleksi
    //     $data = collect();
    //     $data = $data->merge($rincianNota);
    //     $data = $data->merge($subRincianObjekDanSubKegiatan);

    //     // Tambahkan data pajak dengan menyesuaikan kolom debet dan kredit
    //     $pajak->each(function ($item) {
    //         $item->pencairan = $item->penyetoran;
    //         $item->gu = $item->pemotongan;
    //     });
    //     $data = $data->merge($pajak);

    //     // Urutkan data berdasarkan tanggal
    //     $sortedData = $data->sortBy('tanggal')->values();

    //     // Tambahkan properti saldo ke setiap item
    //     $saldo = 0;
    //     foreach ($sortedData as $item) {
    //         // Asumsi pencairan adalah Debet dan gu adalah Kredit
    //         $debet = $item->pencairan ?? 0;
    //         $kredit = $item->gu ?? 0;
    //         $saldo += $debet - $kredit;
    //         $item->saldo = $saldo;

    //         // Tambahkan logika untuk menentukan uraian
    //         if (isset($item->notaPencairanDana)) {
    //             $item->uraian = 'Nota Pencairan Dana(NPD)';
    //         } else {
    //             $item->uraian = $item->uraian ?? 'Uraian Tidak Diketahui';
    //         }
    //     }

    //     return view('buku.bbp', compact('sortedData'));
    // }

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

    public function printBukuPembantu()
    {
        $sortedData = $this->getSortedData();
        $pdf = Pdf::loadView('pdf.bbp', ['sortedData' => $sortedData]);
        return $pdf->download('Buku_Besar_Pembantu.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BukuBesarPembantu  $bukuBesarPembantu
     * @return \Illuminate\Http\Response
     */
    public function show(BukuBesarPembantu $bukuBesarPembantu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BukuBesarPembantu  $bukuBesarPembantu
     * @return \Illuminate\Http\Response
     */
    public function edit(BukuBesarPembantu $bukuBesarPembantu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BukuBesarPembantu  $bukuBesarPembantu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BukuBesarPembantu $bukuBesarPembantu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BukuBesarPembantu  $bukuBesarPembantu
     * @return \Illuminate\Http\Response
     */
    public function destroy(BukuBesarPembantu $bukuBesarPembantu)
    {
        //
    }
}
