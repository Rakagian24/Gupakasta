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
        $rincianNota = RincianNota::with('notaPencairanDana.sub_kegiatan.kegiatan.program.bidangUrusan.urusan');
        $npdId = $request->query('npd_id');

        return view('npd.rincian.index', compact('rincianNota', 'npdId'));
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
            'npd_id' => 'required|exists:nota_pencairan_dana,id',
            'anggaran' => 'required|numeric',
            'akumulasi_sebelumnya' => 'nullable|numeric',
            'pencairan' => 'nullable|numeric',
            'sisa_anggaran' => 'nullable|numeric',
        ]);

        RincianNota::create($validatedData);

        return redirect('/npd/rincian_nota')->with('success', 'Berhasil Menambahkan Rincian Nota Pencairan Dana');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RincianNota  $rincianNota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
