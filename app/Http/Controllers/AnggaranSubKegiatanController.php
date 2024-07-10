<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;
use App\Models\AnggaranKegiatan;
use App\Models\AnggaranSubKegiatan;

class AnggaranSubKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $anggaranKegiatanId = $request->query('anggaran_kegiatan_id');
        $anggaranSubKegiatan = AnggaranSubKegiatan::where('anggaran_kegiatan_id', $anggaranKegiatanId)->get();

        return view('anggaran.subkegiatan.index', compact('anggaranSubKegiatan', 'anggaranKegiatanId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $anggaranKegiatanId = $request->query('anggaran_kegiatan_id');

        // Ambil data AnggaranKegiatan berdasarkan ID
        $anggaranKegiatan = AnggaranKegiatan::findOrFail($anggaranKegiatanId);

        // Ambil sub kegiatan berdasarkan kode_kegiatan
        $subKegiatans = SubKegiatan::where('kode_kegiatan', $anggaranKegiatan->kode_kegiatan)->get();

        return view('anggaran.subkegiatan.create', compact('anggaranKegiatanId', 'subKegiatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_sub_kegiatan' => 'required|string|max:255',
            'anggaran_kegiatan_id' => 'required|exists:anggarankegiatans,id',
        ]);

        AnggaranSubKegiatan::create([
            'kode_sub_kegiatan' => $request->kode_sub_kegiatan,
            'anggaran_kegiatan_id' => $request->anggaran_kegiatan_id,
        ]);

        return redirect()->route('sub_kegiatan.index', ['anggaran_kegiatan_id' => $request->anggaran_kegiatan_id])
            ->with('success', 'Sub Kegiatan berhasil ditambahkan.');
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
        $anggaranSubKegiatan = AnggaranSubKegiatan::findOrFail($id);
        $subKegiatans = SubKegiatan::where('kode_kegiatan', $anggaranSubKegiatan->anggaranKegiatan->kode_kegiatan)->get();

        return view('anggaran.subkegiatan.edit', compact('anggaranSubKegiatan', 'subKegiatans'));
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
        $request->validate([
            'kode_sub_kegiatan' => 'required|string|max:255',
        ]);

        $anggaranSubKegiatan = AnggaranSubKegiatan::findOrFail($id);

        $anggaranSubKegiatan->update([
            'kode_sub_kegiatan' => $request->kode_sub_kegiatan,
        ]);

        return redirect()->route('sub_kegiatan.index', ['anggaran_kegiatan_id' => $anggaranSubKegiatan->anggaran_kegiatan_id])
            ->with('success', 'Sub Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggaranSubKegiatan = AnggaranSubKegiatan::findOrFail($id);
        $anggaranKegiatanId = $anggaranSubKegiatan->anggaran_kegiatan_id;
        $anggaranSubKegiatan->delete();

        return redirect()->route('sub_kegiatan.index', ['anggaran_kegiatan_id' => $anggaranKegiatanId])
            ->with('success', 'Sub Kegiatan berhasil dihapus.');
    }
}
