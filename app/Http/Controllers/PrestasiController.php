<?php

namespace App\Http\Controllers;

use App\prestasi;
use App\eskul;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasi = prestasi::with('eskul')->get();
        return view('prestasi.index',compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eskuls = eskul::all();
         return view('prestasi.create',compact('eskuls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'keterangan' => 'required|',
            'id_eskul' => 'required',
        ]);
        $prestasi = new prestasi;
        $prestasi->nama = $request->nama;
        $prestasi->keterangan = $request->keterangan;
        $prestasi->id_eskul = $request->id_eskul;
        $prestasi->save();
        return redirect()->route('prestasis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestasi = prestasi::findOrFail($id);
        return view('prestasi.show',compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestasi = prestasi::findOrFail($id);
         $eskul = eskul::all();
         $selectedEskul = prestasi::findOrFail($id)->eskul_id;
        return view('prestasi.edit',compact('prestasis','eskuls','selectedEskul')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'keterangan' => 'required|',
            'eskul_id' => 'required',
        ]);
        $prestasi = prestasi::findOrFail($id);
        $prestasi->nama = $request->nama;
        $prestasi->keterangan = $request->keterangan;
        $prestasi->eskul_id = $request->eskul_id;
        $prestasi->save();
        return redirect()->route('prestasis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = prestasi::findOrFail($id);
        $a->delete();
        return redirect()->route('prestasis.index');
    }
}
