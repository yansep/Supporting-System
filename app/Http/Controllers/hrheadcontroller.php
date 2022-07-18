<?php

namespace App\Http\Controllers;

use App\Models\recruitsku;
use Illuminate\Http\Request;

class hrheadcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('HR HEAD');
        $search = $request->search;

        $recruitskus = recruitsku::when($search, function($query, $search){
            return $query->where('nama','LIKE',"%{$search}%")
            ->orWhere('nik', 'LIKE',"%{$search}%");
        })->paginate(5);

       return view('dashboard.hrhead.index',[
           'recruitskus' => $recruitskus,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $recruitskus=recruitsku::find($id);
        return view('dashboard.hrhead.edit',compact('recruitskus'));//
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
            'nik' => 'required|max:255',
            'nama' => 'required|max:255',
            'asal' => 'required|max:255',
            'ketklaim' => 'required|max:255',
            'statuskaryawan' => 'required|max:255',
            'k0' => 'max:50',
            'k1' => 'max:50',
            'k2' => 'max:50',
            'k3' => 'max:50',

            'npk' => 'required|max:7',
            'kolom1' => 'max:255',
            'kolom2' => 'max:255',
            'total' => 'max:255',
            'statushrhead' => 'required|max:255',
            'keterangan' => 'max:255',
        ]);

        $recruitskus= recruitsku::find($id)->update($validatedData);
        return redirect('/dashboard/hrhead')->with('success', 'Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
