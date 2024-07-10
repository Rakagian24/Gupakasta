<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubRincianObjek;
use App\Models\AnggaranRekening;

class AnggaranRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $anggaranSubKegiatanId = $request->query('anggaran_sub_kegiatan_id');
        $anggaranKegiatanId = $request->query('anggaran_kegiatan_id');
        $anggaranRekening = AnggaranRekening::where('anggaran_sub_kegiatan_id', $anggaranSubKegiatanId)->get();
        // $anggaranSubKegiatan = AnggaranSubKegiatan::where('anggaran_kegiatan_id', $anggaranKegiatanId)->get();

        return view('anggaran.rekening.index', compact('anggaranRekening', 'anggaranSubKegiatanId', 'anggaranKegiatanId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $anggaranSubKegiatanId = $request->query('anggaran_sub_kegiatan_id');
        $anggaranKegiatanId = $request->query('anggaran_kegiatan_id');

        // Menggunakan eager loading
        $subRincianObjeks = SubRincianObjek::with(['rincianObjek.objek.jenis.kelompok.akun'])->get();

        return view('anggaran.rekening.create', compact('anggaranSubKegiatanId', 'subRincianObjeks', 'anggaranKegiatanId'));
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
            'kode_sub_rincian_objek' => 'required|exists:sub_rincian_objek,id',
            'anggaran' => 'required|numeric',
            'spj_lalu' => 'nullable|numeric',
            'ls' => 'nullable|numeric',
            'gu' => 'nullable|numeric',
            'spj_ini' => 'nullable|numeric',
        ]);

        $sisaAnggaran = $request->anggaran - ($request->spj_lalu ?? 0) - ($request->ls ?? 0) - ($request->gu ?? 0) - ($request->spj_ini ?? 0);

        AnggaranRekening::create([
            'anggaran_sub_kegiatan_id' => $request->anggaran_sub_kegiatan_id,
            'kode_sub_rincian_objek' => $request->kode_sub_rincian_objek,
            'anggaran' => $request->anggaran,
            'spj_lalu' => $request->spj_lalu,
            'ls' => $request->ls,
            'gu' => $request->gu,
            'spj_ini' => $request->spj_ini,
            'sisa_anggaran' => $sisaAnggaran,
        ]);

        return redirect()->route('rekening.index', ['anggaran_sub_kegiatan_id' => $request->anggaran_sub_kegiatan_id])
            ->with('success', 'Anggaran Rekening berhasil ditambahkan.');
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
        $anggaranRekening = AnggaranRekening::findOrFail($id);
        $subRincianObjeks = SubRincianObjek::with(['rincianObjek.objek.jenis.kelompok.akun'])->get();

        return view('anggaran.rekening.edit', compact('anggaranRekening', 'subRincianObjeks'));
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
            'kode_sub_rincian_objek' => 'required|exists:sub_rincian_objek,id',
            'anggaran' => 'required|numeric',
            'spj_lalu' => 'nullable|numeric',
            'ls' => 'nullable|numeric',
            'gu' => 'nullable|numeric',
            'spj_ini' => 'nullable|numeric',
        ]);

        $anggaranRekening = AnggaranRekening::findOrFail($id);

        $sisaAnggaran = $request->anggaran - ($request->spj_lalu ?? 0) - ($request->ls ?? 0) - ($request->gu ?? 0) - ($request->spj_ini ?? 0);

        $anggaranRekening->update([
            'kode_sub_rincian_objek' => $request->kode_sub_rincian_objek,
            'anggaran' => $request->anggaran,
            'spj_lalu' => $request->spj_lalu,
            'ls' => $request->ls,
            'gu' => $request->gu,
            'spj_ini' => $request->spj_ini,
            'sisa_anggaran' => $sisaAnggaran,
        ]);

        return redirect()->route('rekening.index', ['anggaran_sub_kegiatan_id' => $anggaranRekening->anggaran_sub_kegiatan_id])
            ->with('success', 'Anggaran Rekening berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggaranRekening = AnggaranRekening::findOrFail($id);
        $anggaranSubKegiatanId = $anggaranRekening->anggaran_sub_kegiatan_id;
        $anggaranRekening->delete();

        return redirect()->route('rekening.index', ['anggaran_sub_kegiatan_id' => $anggaranSubKegiatanId])
            ->with('success', 'Anggaran Rekening berhasil dihapus.');
    }
}
