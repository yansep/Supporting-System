<?php

namespace App\Http\Controllers;
use App\Models\recruitsku;
use Illuminate\Http\Request;

class inputskucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('PGS');
        return view('dashboard.inputsku.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.inputsku.create',[
            'recruitskus' => recruitsku::all()
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
        $validatedData =  $request->validate([
            'nik' => 'required|max:20|unique:recruitskus',
            'nama' => 'required|max:255',
           'asal' => 'required|max:255',
           'ketklaim' => 'required',
          'statuskaryawan' => 'required',
          'npk' => 'max:7',
          'k0' => 'max:50',
          'k1' => 'max:50',
          'k2' => 'max:50',
          'k3' => 'max:50',
          'dokumen_ktp' => 'mimes:png,pdf,pdf|file|max:2024',
          'keterangan' => 'max:255',
           //'nominal' => 'required',
            //'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx|file|max:2024',
        ]);

        $file = $request->file('dokumen_ktp');
            if ($file)
            {
                $nama_file = $file->getClientOriginalName();
                $file->move('dokumen/', $nama_file);
                $validatedData['dokumen_ktp'] = 'dokumen/' .$nama_file;
            }

        $validatedData['user_id'] = auth()->user()->id;
        recruitsku::create($validatedData);
        return redirect('/dashboard/sku')->with('success', 'Berhasil di tambahkan!');

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
        //
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
        //
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
