<?php

namespace App\Http\Controllers;


use App\Models\recruitsku;
use Illuminate\Http\Request;

class skucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('PGS');
        //return recruitsku::where('user_id', auth()->user()->id)->get();
        if( $search = $request->search)
         {
            //$recruitskus = recruitsku::where('nik','LIKE','%' . $request->search. '%')->Paginate(5);
            $recruitskus = recruitsku::when($search, function($query, $search){
                return $query->where('user_id', auth()->user()->id) ->where('nama','LIKE',"%{$search}%")
                ->orWhere('nik', 'LIKE',"%{$search}%")->where('user_id', auth()->user()->id);
            })->paginate(5);
        }
         else{
            $recruitskus = recruitsku::where('user_id', auth()->user()->id)->Paginate(5);
         }

        return view('dashboard.sku.index',[
            'recruitskus' => $recruitskus
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
        $recruitskus=recruitsku::find($id);
        return view('dashboard.sku.show',compact('recruitskus'));
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
        return view('dashboard.sku.edit',compact('recruitskus'));//
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
            'npk' => 'max:7',
            'nama' => 'required|max:255',
            'asal' => 'required|max:255',
            'ketklaim' => 'required|max:255',
            'statuskaryawan' => 'required|max:255',
            'k0' => 'max:50',
            'k1' => 'max:50',
            'k2' => 'max:50',
            'k3' => 'max:50',

            'kolom1' => 'max:255',
            'kolom2' => 'max:255',
            'total' => 'max:255',
            'statuspgs' => 'max:255',
            'keterangan' => 'max:255',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $recruitskus= recruitsku::find($id)->update($validatedData);
        return redirect('/dashboard/sku')->with('success', 'Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recruitsku=recruitsku::find($id);
        $recruitsku->delete();
        return redirect('/dashboard/sku')->with('success', 'Data Telah Dihapus!');
    }
}
