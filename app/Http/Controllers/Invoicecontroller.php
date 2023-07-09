<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Province;
use App\Models\Perjalanan;
use App\Models\recruitsku;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Invoicecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('PGS');
        $provinces = Province::all();
        $regencies = Regency::all();
        // $perjalanans= Perjalanan::all();
        return view('dashboard.inputsku.invoice',[
        'recruitskus' => recruitsku::all(),

        'province' => $provinces,
        'regency' => $regencies,
        // 'perjalanan' => $perjalanans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
            $regencies = Regency::all();
            $recruitskus = recruitsku::all();
            // $perjalanans= Perjalanan::all();
        return view ('dashboard.inputsku.invoice',[
            'recruitskus' => recruitsku::all(),
            'province' => $provinces,
            'regency' => $regencies,
            // 'perjalanan' => $perjalanans,
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
            'statuskaryawan' => 'required',
            'npk' => 'max:10',
            'k0' => 'max:50',
            'k1' => 'max:50',
            'k2' => 'max:50',
            'k3' => 'max:50',

            'ketklaim' => 'required',
            'statuspgs' => 'max:255',
            'status' => 'max:255',
            'statushrhead' => 'max:255',
            'statusgahead' => 'max:255',
            'statuscma' => 'max:255',
            'dokumen_ktp' => 'required|mimes:pdf,pdf|file|max:5024',
            'dokumen_ktpistri' => 'mimes:pdf,pdf|file|max:5024',
            'dokumen_kK' => 'mimes:pdf,pdf|file|max:5024',
            'keterangan' => 'max:255',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx|file|max:2024',
        ]);

        $file_kk = $request->file('dokumen_kk');
        $file_ktpistri = $request->file('dokumen_ktpistri');
        $file = $request->file('dokumen_ktp');
            if ($file)
            {
                $nama_file = date("YmdHis") . $file->getClientOriginalName();
                $file->move('dokumen/', $nama_file);
                $validatedData['dokumen_ktp'] = 'dokumen/' .$nama_file;
            }

            if ($file_ktpistri)
            {
                $nama_file = date("YmdHis") . $file_ktpistri->getClientOriginalName();
                $file_ktpistri->move('dokumen/KTP ISTRI (Pasangan)/', $nama_file);
                $validatedData['dokumen_ktpistri'] = 'dokumen/KTP ISTRI (Pasangan)/' .$nama_file;
            }

            if ($file_kk)
            {
                $nama_file = date("YmdHis") . $file_kk->getClientOriginalName();
                $file_kk->move('dokumen/KK/', $nama_file);
                $validatedData['dokumen_kk'] = 'dokumen/KK/' .$nama_file;
            }


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['province_id'] = $request->province_id;
        $validatedData['regency_id'] = $request->regency_id;

        $recruitsku = recruitsku::create($validatedData);

        Perjalanan::create([
            'recruitsku_id' => $recruitsku->id,
            // 'nama' => $request->perjalanan_nama,
            'kab_asal' =>  $request->kab_asal,
            'kab_tiba' =>  $request->kab_tiba,
            'org_transport'     =>  $request->org_transport,
            'org_cefetaria'     =>  $request->org_cefetaria,
            'kolom1'            => $request->kolom1,
            'kolom2'             => $request->kolom2,
            'total_cafetaria'    =>  $request->total_cafetaria,
            'total_transport'    =>  $request->total_transport,
            'total'              =>  $request->total,
        ]);

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
        $recruitskus=recruitsku::find($id);
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->first();
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('dashboard.inputsku.show',[
            'recruitskus' => $recruitskus,
            'perjalanan' => $perjalanan,
            'province' => $provinces,
            'regency' => $regencies,
        ]);
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
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->first();
        $tanggal_verif = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('dashboard.inputsku.edit', [
            'recruitskus' => $recruitskus,
            'perjalanan' => $perjalanan,
            'province' => $provinces,
            'regency' => $regencies,
            'tanggal_verif'=> $tanggal_verif,
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
            'nik' => 'required|max:255',
            'nama' => 'required|max:255',
            'npk' => 'max:7',

            'statuskaryawan' => 'required|max:255',
            'k0' => 'max:50',
            'k1' => 'max:50',
            'k2' => 'max:50',
            'k3' => 'max:50',

            'ketklaim' => 'required|max:255',
            'keterangan' => 'max:255',
            'statuspgs' => 'max:255',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['province_id'] = $request->province_id;
        $validatedData['regency_id'] = $request->regency_id;
        $validatedData['tanggal_verif'] = $request->tanggal_verif;
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
        //
    }
}
