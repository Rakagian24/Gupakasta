<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuRincianObjek;
use App\Models\BukuPembantuPajak;
use App\Models\Pajak;

class BukuPembantuPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pajak = BukuRincianObjek::with('anggaranRekening.subRincianObjek.rincianObjek.objek.jenis.kelompok.akun')->get();
        return view('pajak.buku.index', compact('pajak'));
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
        // dd($request->all());
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|string|max:255',
            'pemotongan' => 'required|numeric',
            'kode_bro' => 'required|exists:buku_rincian_objek,id',
        ]);

        // dd($request);
        Pajak::create([
            'tanggal' => $request->tanggal, // or any other date field you want to set
            'uraian' => $request->uraian,
            'pemotongan' => $request->pemotongan,
            'kode_bro' => $request->kode_bro,
        ]);

        return redirect()->route('pajak.buku.show', $request->id)->with('success', 'Data pajak berhasil ditambahkan.');

        // Redirect to the show view with the ID of the updated record
        // return redirect()->route('pajak.bro.show', $pajakRecord->id)->with('success', 'Penyetoran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BukuPembantuPajak  $bukuPembantuPajak
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bukuRincianObjek = BukuRincianObjek::with('anggaranRekening.subRincianObjek.rincianObjek.objek.jenis.kelompok.akun')
            ->where('id', $id)
            ->first(); // Use first() instead of get()
        $pajak = Pajak::where('kode_bro', $id)->get(); // Assume you want to get a collection here

        return view('pajak.buku.show', compact('bukuRincianObjek', 'pajak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BukuPembantuPajak  $bukuPembantuPajak
     * @return \Illuminate\Http\Response
     */
    public function edit(BukuPembantuPajak $bukuPembantuPajak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BukuPembantuPajak  $bukuPembantuPajak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BukuPembantuPajak  $bukuPembantuPajak
     * @return \Illuminate\Http\Response
     */
    public function destroy(BukuPembantuPajak $bukuPembantuPajak)
    {
        //
    }
}
