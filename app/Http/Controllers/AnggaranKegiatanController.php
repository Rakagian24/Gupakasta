<?php

namespace App\Http\Controllers;

use App\Models\AnggaranKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class AnggaranKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggaranKegiatan = AnggaranKegiatan::all();
        return view('anggaran.kegiatan.index', compact('anggaranKegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggaran.kegiatan.create', [
            'kegiatans' => Kegiatan::with(['program.bidangUrusan.urusan'])->get()
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
            'kode_kegiatan' => 'required|max:10',
        ]);

        AnggaranKegiatan::create($validatedData);

        return redirect('/anggaran/kegiatan')->with('success', 'Berhasil Menambahkan Anggaran Kegiatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggaranKegiatan = AnggaranKegiatan::findOrFail($id);
        $kegiatans = Kegiatan::with(['program.bidangUrusan.urusan'])->get();
        return view('anggaran.kegiatan.edit', compact('anggaranKegiatan', 'kegiatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_kegiatan' => 'required|max:10',
        ]);

        $anggaranKegiatan = AnggaranKegiatan::findOrFail($id);
        $anggaranKegiatan->update($validatedData);

        return redirect('/anggaran/kegiatan')->with('success', 'Berhasil Mengubah Anggaran Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggaranKegiatan = AnggaranKegiatan::findOrFail($id);
        $anggaranKegiatan->delete();
        return redirect('/anggaran/kegiatan')->with('success', 'Berhasil Menghapus Anggaran Kegiatan');
    }
}
