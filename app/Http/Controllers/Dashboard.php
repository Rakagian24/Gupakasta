<?php

namespace App\Http\Controllers;

use App\Models\AnggaranRekening;
use App\Models\BukuRincianObjek;
use App\Models\NotaPencairanDana;
use App\Models\Pajak;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $Kartu = BukuRincianObjek::count(); // Menghitung jumlah kartu kendali
        $Pajak = Pajak::count(); // Menghitung jumlah dokumen pajak
        $Nota = NotaPencairanDana::count(); // Menghitung jumlah nota pencairan dana
        $gu = BukuRincianObjek::sum('gu'); // Misalnya menghitung total pencairan dana
        $total_anggaran = AnggaranRekening::sum('sisa_anggaran');; // Jumlah total anggaran bisa diambil dari tabel jika tersedia

        // Hitung persentase anggaran yang terpakai
        $anggaranpersen = ($gu / $total_anggaran) * 100;

        // Kirim data ke view
        return view('dashboard.index', [
            'Kartu' => $Kartu,
            'Pajak' => $Pajak,
            'Nota' => $Nota,
            'anggaranpersen' => $anggaranpersen,
            'gu' => $gu,
            'total_anggaran' => $total_anggaran,
        ]);
    }
}
