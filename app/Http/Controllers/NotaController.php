<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;
use App\Http\Requests\StorenotaRequest;
use App\Http\Requests\UpdatenotaRequest;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nota = Nota::all();

        // Kirim data tersebut ke view 'Nota.index'
        return view('npd/nota.index', compact('nota'));
        // return view('Nota.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('npd/nota.create', [
            'programs' => Program::with(['bidangUrusan.urusan'])->get(),
            'kegiatans' => Kegiatan::with(['program.bidangUrusan.urusan'])->get(),
            'subkegiatans' => SubKegiatan::with(['kegiatan.program.bidangUrusan.urusan'])->get()
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
            'PPTK' => 'required|max:255',
            'kode_program' => 'required|max:10',
            'kode_kegiatan' => 'required|max:10',
            'kode_sub_kegiatan' => 'required',
            'Tahun' => 'required',
            'Nomer' => 'required|max:50',
        ]);

        Nota::create($validatedData);

        return redirect('/npd/nota')->with('success', 'Berhasil Menambahkan PPTK Pemilik Nota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        return view('/npdnota.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
