<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggaranRekening;
use App\Models\BukuRincianObjek;

class BukuRincianObjekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukuRincianObjek = AnggaranRekening::with('subRincianObjek.rincianObjek.objek.jenis.kelompok.akun')->get();
        return view('bro.index', compact('bukuRincianObjek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $anggaranRekeningId = $request->query('anggaran_rekening_id');
        $anggaranRekening = AnggaranRekening::with('subRincianObjek.rincianObjek.objek.jenis.kelompok.akun')
            ->where('id', $anggaranRekeningId)
            ->first(); // Use first() instead of get()

        return view('bro.create', compact('anggaranRekening'));
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
            'anggaran_rekening_id' => 'required|exists:anggaranrekenings,id',
            'tanggal' => 'nullable|date',
            'no_bukti' => 'nullable|string',
            'uraian' => 'nullable|string',
            'ls' => 'nullable|numeric',
            'gu' => 'nullable|numeric',
            'saldo' => 'nullable|numeric',
        ]);
        // dd($validatedData);
        BukuRincianObjek::create($validatedData);

        return redirect()->route('buku_rincian_objek.show', $request->anggaran_rekening_id)->with('success', 'Berhasil Menambahkan Buku Rincian Objek');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BukuRincianObjek  $bukuRincianObjek
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $anggaranRekeningId = $request->query('anggaran_rekening_id');
        $anggaranRekening = AnggaranRekening::with('subRincianObjek.rincianObjek.objek.jenis.kelompok.akun')
            ->where('id', $id)
            ->first(); // Use first() instead of get()
        $bukuRincianObjek = BukuRincianObjek::where('anggaran_rekening_id', $id)->get(); // Assume you want to get a collection here

        return view('bro.show', compact('bukuRincianObjek', 'anggaranRekening'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BukuRincianObjek  $bukuRincianObjek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bukuRincianObjek = BukuRincianObjek::findOrFail($id);
        $anggaranRekening = AnggaranRekening::findOrFail($bukuRincianObjek->anggaran_rekening_id);
        return view('bro.edit', compact('bukuRincianObjek', 'anggaranRekening'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BukuRincianObjek  $bukuRincianObjek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bukuRincianObjek = BukuRincianObjek::findOrFail($id);

        $bukuRincianObjek->tanggal = $request->input('tanggal');
        $bukuRincianObjek->no_bukti = $request->input('no_bukti');
        $bukuRincianObjek->uraian = $request->input('uraian');
        $bukuRincianObjek->ls = $request->input('ls');
        $bukuRincianObjek->gu = $request->input('gu');
        $bukuRincianObjek->saldo = $request->input('saldo');

        $bukuRincianObjek->save();

        return redirect()->route('buku_rincian_objek.show', $bukuRincianObjek->anggaran_rekening_id)
            ->with('success', 'Data Buku Rincian Objek berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BukuRincianObjek  $bukuRincianObjek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bukuRincianObjek = BukuRincianObjek::findOrFail($id);
        $anggaranRekeningId = $bukuRincianObjek->anggaran_rekening_id;
        $bukuRincianObjek->delete();

        return redirect()->route('buku_rincian_objek.show', $anggaranRekeningId)
            ->with('success', 'Data Buku Rincian Objek berhasil dihapus.');
    }
}
