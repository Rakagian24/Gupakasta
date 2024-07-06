<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Jenis;
use App\Models\Objek;
use App\Models\Kelompok;
use App\Models\RincianObjek;
use Illuminate\Http\Request;
use App\Models\SubRincianObjek;

class RekeningController extends Controller
{
    public function Akun()
    {
        $akuns = Akun::all();
        return view('rekening.akun', compact('akuns'));
    }

    public function kelompok()
    {
        $kelompoks = Kelompok::with('akun')->get();
        return view('rekening.kelompok', compact('kelompoks'));
    }

    public function jenis()
    {
        $jeniss = Jenis::with(['kelompok.akun'])->get();
        return view('rekening.jenis', compact('jeniss'));
    }

    public function objek()
    {
        $objeks = Objek::with(['jenis.kelompok.akun'])->get();
        return view('rekening.objek', compact('objeks'));
    }

    public function rincianObjek()
    {
        $rincianObjeks = RincianObjek::with(['objek.jenis.kelompok.akun'])->get();
        return view('rekening.rincian_objek', compact('rincianObjeks'));
    }

    public function subRincianObjek()
    {
        $subRincianObjeks = SubRincianObjek::with(['rincianObjek.objek.jenis.kelompok.akun'])->get();
        return view('rekening.sub_rincian_objek', compact('subRincianObjeks'));
    }
}
