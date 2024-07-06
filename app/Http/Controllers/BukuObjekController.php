<?php

namespace App\Http\Controllers;

use App\Models\BukuObjek;
use App\Models\SubRincianObjek;
use Illuminate\Http\Request;

class BukuObjekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukuObjek = BukuObjek::all();

        return view('bro/objek/index', compact('bukuObjek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bro/objek/create', [
            'subrincianobjeks' => SubRincianObjek::with(['rincianObjek.objek.jenis.kelompok.akun'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'SKPD' => 'required|max:255',
            'kode_sub_rincian_objek' => 'required',
            'jumlah' => 'required|max:50',
            'tahun' => 'required',
        ]);

        BukuObjek::create($validatedData);

        return redirect('/bro/objek')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BukuObjek  $bukuObjek
     * @return \Illuminate\Http\Response
     */
    public function show(BukuObjek $bukuObjek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BukuObjek  $bukuObjek
     * @return \Illuminate\Http\Response
     */
    public function edit(BukuObjek $bukuObjek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BukuObjek  $bukuObjek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BukuObjek $bukuObjek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BukuObjek  $bukuObjek
     * @return \Illuminate\Http\Response
     */
    public function destroy(BukuObjek $bukuObjek)
    {
        //
    }
}
