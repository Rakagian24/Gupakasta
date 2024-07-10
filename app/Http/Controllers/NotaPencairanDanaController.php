<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;
use App\Models\NotaPencairanDana;

class NotaPencairanDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nota = NotaPencairanDana::all();

        return view('npd/nota.index', compact('nota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('npd/nota.create', [
            'subkegiatans' => SubKegiatan::with(['kegiatan.program.bidangUrusan.urusan'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotaPencairanDanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pptk' => 'required|max:255',
            'kode_sub_kegiatan' => 'required',
            'tahun' => 'required',
            'nomer' => 'required|max:50',
        ]);
        // dd($validatedData);
        NotaPencairanDana::create($validatedData);

        return redirect('/npd/nota_pencairan_dana')->with('success', 'Berhasil Menambahkan PPTK Pemilik Nota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaPencairanDana  $notaPencairanDana
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaPencairanDana  $notaPencairanDana
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notaPencairanDana = NotaPencairanDana::findOrFail($id);
        $subKegiatan = SubKegiatan::with(['kegiatan.program.bidangUrusan.urusan'])->get();
        return view('NPD.nota.edit', compact('notaPencairanDana', 'subKegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotaPencairanDanaRequest  $request
     * @param  \App\Models\NotaPencairanDana  $notaPencairanDana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pptk' => 'required|max:255',
            'kode_sub_kegiatan' => 'required',
            'tahun' => 'required',
            'nomer' => 'required|max:50',
        ]);

        $notaPencairanDana = NotaPencairanDana::findOrFail($id);
        $notaPencairanDana->update($validatedData);

        return redirect('/npd/nota_pencairan_dana')->with('success', 'Berhasil Mengubah Nota Pencairan Dana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaPencairanDana  $notaPencairanDana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notaPencairanDana = NotaPencairanDana::findOrFail($id);
        $notaPencairanDana->delete();
        return redirect('/npd/nota_pencairan_dana')->with('success', 'Berhasil Menghapus Nota Pencairan Dana');
    }
}
