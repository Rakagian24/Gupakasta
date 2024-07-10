<?php

namespace App\Http\Controllers;

use App\Models\BukuBesarPembantu;
use App\Models\BukuRincianObjek;
use App\Models\NotaPencairanDana;
use Illuminate\Http\Request;

class BukuBesarPembantuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notaPencairanDana = NotaPencairanDana::with('sub_kegiatan.kegiatan.program.bidangUrusan.urusan')->get();
        $subRincianObjek = BukuRincianObjek::with('anggaranRekening.subRincianObjek.rincianObjek.objek.jenis.kelompok.akun')->get();
        $subKegiatan = BukuRincianObjek::with('anggaranRekening.anggaranSubKegiatan.subKegiatan.kegiatan.program.bidangUrusan.urusan')->get();

        return view('buku.bbp', compact('notaPencairanDana', 'subRincianObjek', 'subKegiatan'));
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
