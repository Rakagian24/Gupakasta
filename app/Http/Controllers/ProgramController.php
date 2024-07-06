<?php

namespace App\Http\Controllers;

use App\Models\BidangUrusan;
use App\Models\Urusan;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\SubKegiatan;
use App\Models\UrusanBidang;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function urusan()
    {
        $urusans = Urusan::all();
        return view('program.urusan', compact('urusans'));
    }

    public function bidangUrusan()
    {
        $bidangUrusans = BidangUrusan::with('urusan')->get();
        return view('program.bidang_urusan', compact('bidangUrusans'));
    }

    public function program()
    {
        $programs = Program::with(['bidangUrusan.urusan'])->get();
        // dd($programs);
        return view('program.program', compact('programs'));
    }

    public function kegiatan()
    {
        $kegiatans = Kegiatan::with(['program.bidangUrusan.urusan'])->get();
        return view('program.kegiatan', compact('kegiatans'));
    }

    public function subKegiatan()
    {
        $subKegiatans = SubKegiatan::with(['kegiatan.program.bidangUrusan.urusan'])->get();
        return view('program.sub_kegiatan', compact('subKegiatans'));
    }
}
