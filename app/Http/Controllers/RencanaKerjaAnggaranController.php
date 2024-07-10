<?php

namespace App\Http\Controllers;

use App\Models\RencanaKerjaAnggaran;
use App\Http\Requests\StoreRencanaKerjaAnggaranRequest;
use App\Http\Requests\UpdateRencanaKerjaAnggaranRequest;
use App\Models\AnggaranRekening;
use App\Models\AnggaranSubKegiatan;

class RencanaKerjaAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rencanaKerjaAnggaran = AnggaranRekening::with('anggaranSubKegiatan')->get();
        return view('buku.rka', compact('rencanaKerjaAnggaran'));
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
     * @param  \App\Http\Requests\StoreRencanaKerjaAnggaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RencanaKerjaAnggaran $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RencanaKerjaAnggaran  $rencanaKerjaAnggaran
     * @return \Illuminate\Http\Response
     */
    public function show(RencanaKerjaAnggaran $rencanaKerjaAnggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RencanaKerjaAnggaran  $rencanaKerjaAnggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(RencanaKerjaAnggaran $rencanaKerjaAnggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRencanaKerjaAnggaranRequest  $request
     * @param  \App\Models\RencanaKerjaAnggaran  $rencanaKerjaAnggaran
     * @return \Illuminate\Http\Response
     */
    public function update(RencanaKerjaAnggaran $rencanaKerjaAnggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RencanaKerjaAnggaran  $rencanaKerjaAnggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(RencanaKerjaAnggaran $rencanaKerjaAnggaran)
    {
        //
    }
}
