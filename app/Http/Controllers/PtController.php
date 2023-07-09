<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class PtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('ADMIN');
        return view('dashboard.PT.index',[
            'lokasis' => Lokasi::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.PT.create',[
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
        ]);

       // $validatedData['password'] = bcrypt($validatedData['password']);
        $lokasis = Lokasi::create($validatedData);
        return redirect('/dashboard/PT')->with('success', 'Berhasil di tambahkan!');

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
        $lokasis=Lokasi::find($id);
        return view('dashboard.PT.edit',compact('lokasis'));
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

        $lokasis= Lokasi::find($id)->update($validatedData);
        return redirect('/dashboard/PT')->with('success', 'Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasis=Lokasi::find($id);
        $lokasis->delete();
        return redirect('/dashboard/PT')->with('success', 'Data Telah Dihapus!');
    }
}
