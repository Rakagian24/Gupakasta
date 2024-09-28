<?php

namespace App\Http\Controllers;

use App\Models\BukuRincianObjek;
use App\Models\Pajak;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pajak = BukuRincianObjek::with('anggaranRekening.subRincianObjek.rincianObjek.objek.jenis.kelompok.akun')->get();
        return view('pajak.bro.index', compact('pajak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kodeBro = $request->query('kode_bro');
        $bukuRincianObjek = BukuRincianObjek::with('anggaranRekening.subRincianObjek.rincianObjek.objek.jenis.kelompok.akun')
            ->where('id', $kodeBro)
            ->first(); // Use first() instead of get()

        return view('pajak.bro.create', compact('bukuRincianObjek', 'kodeBro'));
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
            'kode_bro' => 'required|exists:buku_rincian_objek,id',
            'tanggal' => 'required|date',
            'uraian' => 'required|string',
            'pemotongan' => 'nullable|string',
            'penyetoran' => 'nullable|string',
            'kode_biling' => 'nullable|string',
        ]);
        // dd($validatedData);
        Pajak::create($validatedData);

        return redirect()->route('pajak.buku.index')->with('success', 'Data berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function show(Pajak $pajak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pajak = Pajak::findOrFail($id);
        return view('pajak.bro.edit', compact('pajak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_bro' => 'required|exists:buku_rincian_objek,id',
            'tanggal' => 'required|date',
            'uraian' => 'required|string',
            'pemotongan' => 'nullable|string',
            'penyetoran' => 'nullable|string',
            'kode_biling' => 'nullable|string',
        ]);
        $pajak = Pajak::findOrFail($id);
        $pajak->update($validatedData);

        return redirect()->route('buku.show', ['buku' => $pajak->kode_bro])->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pajak = Pajak::findOrFail($id); // Cari data berdasarkan ID
        $pajak->delete();

        return redirect()->route('pajak.buku.index')->with('success', 'Data berhasil dihapus.');
    }
}
