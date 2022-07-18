<?php

namespace App\Http\Controllers;

use App\Models\recruitsku;
use Carbon\Carbon;
use Illuminate\Http\Request;

class hrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->authorize('HR');
        $search = $request->search;
        $awal = date("Y-m-d");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');;

        $recruitskus = recruitsku::when($search, function($query, $search){
            return $query->where('nama','LIKE',"%{$search}%")
            ->orWhere('nik', 'LIKE',"%{$search}%");
        })->paginate(5);

       return view('dashboard.hr.index',[
           'recruitskus' => $recruitskus,
       ]);
       /*return view ('dashboard.hr.index', [
        'recruitskus' => recruitsku::all()
       ]);*/
    }

    public function print()
    {
        return view('dashboard.print',[
            'recruitskus' => recruitsku::all()
        ]);
    }

    public function downloadpdf($id)
    {
        $recruitskus=recruitsku::find($id);
        return view('dashboard.downloadpdf',compact('recruitskus'));
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
    public function show(recruitsku $recruitsku, $id)
    {
        $awal = date("Y-m-d");
        $recruitskus=recruitsku::find($id);
        return view('dashboard.hr.show',compact('recruitskus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $awal = date("Y-m-d");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');;
        $recruitskus=recruitsku::find($id);
        return view('dashboard.hr.edit',compact('recruitskus'));//
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
        $awal = date("Y-m-d");
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
            'npk' => 'max:7',
            'kolom1' => 'max:255',
            'kolom2' => 'max:255',
            'total' => 'max:255',
            'tanggal' => 'max:255',
            'status' => 'max:255',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx|file|max:2024',
            'keterangan' => 'max:255',
            'PT' => 'max:255',

        ]);

        $file = $request->file('dokumen');
            if ($file)
            {
                $nama_file = $file->getClientOriginalName();
                $file->move('dokumen/', $nama_file);
                $validatedData['dokumen'] = 'dokumen/' .$nama_file;
            }





        $recruitskus= recruitsku::find($id)->update($validatedData);
        return redirect('/dashboard/hr')->with('success', 'Berhasil di Ubah!');
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
        return redirect('/dashboard/hr')->with('success', 'Data Telah Dihapus!');
    }
}
