<?php

namespace App\Http\Controllers;

use App\eskul;
use Illuminate\Http\Request;

class EskulController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = eskul::all();
        return view('eskul.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('eskul.create');
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
            'nama' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);

        $a = new eskul;
        $a->nama = $request->nama;
        $a->keterangan = $request->keterangan;
        $a->save();
        return redirect()->route('eskuls.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = eskul::findOrFail($id);
        return view('eskul.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $a = eskul::findOrFail($id);
        return view('eskul.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);

        // update data berdasarkan id
        $a = eskul::findOrFail($id);
        $a->nama = $request->nama;
        $a->keterangan = $request->keterangan;
        $a->save();
        return redirect()->route('eskuls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $a = eskul::findOrFail($id);
        $a->delete();
        return redirect()->route('eskuls.index');  
    }
}
