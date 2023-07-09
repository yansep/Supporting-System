<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Lokasi_estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('ADMIN');
        return view('dashboard.estate.index',[
            'estates' => Lokasi_estate::all(),
            'lokasis' => Lokasi::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.estate.create',[
            'estates' => Lokasi_estate::all(),
            'lokasis' => Lokasi::all()
        ]);//
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
            'nama' => 'required|max:255',
            'PT' => 'max:255'
        ]);
        $validatedData['lokasi_id'] = $request->lokasi_id;
        Lokasi_estate::create($validatedData);
        return redirect('/dashboard/estate')->with('success', 'Berhasil di tambahkan!');
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
        return view ('dashboard.estate.edit',[
            'lokasis' => Lokasi::all(),
            'lokasi_estates' => Lokasi_estate::find($id),
        ]);
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
            'nama' => 'required|max:255',
        ]);
        $validatedData['lokasi_id'] = $request->lokasi_id;
        $validatedData['lokasi_estate_id'] = $request->lokasi_estate_id;
        $users= Lokasi_estate::find($id)->update($validatedData);
        return redirect('/dashboard/estate')->with('success', 'Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estates=Lokasi_estate::find($id);
        $estates->delete();
        return redirect('/dashboard/estate')->with('success', 'Data Telah Dihapus!');
    }
}
