<?php

namespace App\Http\Controllers;

use App\Models\AnggaranRekening;
use App\Models\NotaPencairanDana;
use App\Models\RincianNota;
use Illuminate\Http\Request;

class RincianNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $npdId = $request->query('npd_id');
        $notaPencairanDana = NotaPencairanDana::findOrFail($npdId);
        $rincianNota = RincianNota::with('notaPencairanDana.sub_kegiatan.kegiatan.program.bidangUrusan.urusan')->where('npd_id', $npdId)->get();

        return view('npd.rincian.index', compact('rincianNota', 'npdId', 'notaPencairanDana'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $npdId = $request->query('npd_id');
        $notaPencairanDana = NotaPencairanDana::findOrFail($npdId);
        $sisaAnggaran = AnggaranRekening::pluck('sisa_anggaran');

        // Menjumlahkan semua nilai "sisa_anggaran"
        $totalAnggaran = $sisaAnggaran->sum();

        return view('NPD.rincian.create', compact('npdId', 'totalAnggaran', 'notaPencairanDana'));
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
            'npd_id' => 'exists:nota_pencairan_dana,id',
            'tanggal' => 'nullable|date',
            'anggaran' => 'numeric',
            'akumulasi_sebelumnya' => 'nullable|numeric',
            'pencairan' => 'nullable|numeric',
            'sisa_anggaran' => 'nullable|numeric',
        ]);
        // dd($validatedData);
        RincianNota::create($validatedData);

        return redirect()->route('rincian_nota.index', ['npd_id' => $request->npd_id])->with('success', 'Berhasil Menambahkan Rincian Nota Pencairan Dana');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RincianNota  $rincianNota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RincianNota  $rincianNota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rincianNota = RincianNota::with('notaPencairanDana.sub_kegiatan.kegiatan.program.bidangUrusan.urusan')->findOrFail($id);
        return view('NPD.rincian.edit', compact('rincianNota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RincianNota  $rincianNota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'npd_id' => 'exists:nota_pencairan_dana,id',
            'tanggal' => 'date',
            'anggaran' => 'numeric',
            'akumulasi_sebelumnya' => 'nullable|numeric',
            'pencairan' => 'nullable|numeric',
            'sisa_anggaran' => 'nullable|numeric',
        ]);

        $rincianNota = RincianNota::findOrFail($id);
        $rincianNota->update($validatedData);

        return redirect()->route('rincian_nota.index', ['npd_id' => $rincianNota->npd_id])->with('success', 'Berhasil Mengupdate Rincian Nota Pencairan Dana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RincianNota  $rincianNota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rincianNota = RincianNota::findOrFail($id);

        // Simpan npd_id untuk pengalihan setelah penghapusan
        $npd_id = $rincianNota->npd_id;

        // Hapus rincian nota
        $rincianNota->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('rincian_nota.index', ['npd_id' => $npd_id])->with('success', 'Berhasil Menghapus Rincian Nota Pencairan Dana');
    }
}
