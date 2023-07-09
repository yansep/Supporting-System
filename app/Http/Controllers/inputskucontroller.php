<?php

namespace App\Http\Controllers;
use App\Models\recruitsku;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Perjalanan;
// use App\Models\District;
// use App\Models\Village;

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
        $provinces = Province::all();
        $regencies = Regency::all();
        // $perjalanans= Perjalanan::all();
        return view('dashboard.inputsku.create',[
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
        return view ('dashboard.inputsku.create',[
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
            // 'asal' => 'required|max:255',
            'statuskaryawan' => 'required',
            'npk' => 'max:10',
            'k0' => 'max:50',
            'k1' => 'max:50',
            'k2' => 'max:50',
            'k3' => 'max:50',

            'ketklaim' => 'required',
            // 'org_transport' => 'max:2',
            // 'org_cefetaria' => 'max:2',
            // 'kolom1' => 'max:255',
            // 'kolom2' => 'max:255',
            // 'total' => 'max:255',

            'dokumen_ktp' => 'required|mimes:pdf,pdf|file|max:5024',
            'dokumen_ktpistri' => 'mimes:pdf,pdf|file|max:5024',
            'dokumen_kK' => 'mimes:pdf,pdf|file|max:5024',
            'keterangan' => 'max:255',
        //'nominal' => 'required',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx|file|max:2024',
            'statuspgs' => 'max:255',
            'status' => 'max:255',
            'statushrhead' => 'max:255',
            'statusgahead' => 'max:255',
            'statuscma' => 'max:255',
        ]);

        $file_kk = $request->file('dokumen_kk');
        $file_ktpistri = $request->file('dokumen_ktpistri');
        $file = $request->file('dokumen_ktp');
            if ($file)
            {
                $nama_file =date("YmdHis") . $file->getClientOriginalName();
                $file->move('dokumen/', $nama_file);
                $validatedData['dokumen_ktp'] = 'dokumen/' .$nama_file;
            }

            if ($file_ktpistri)
            {
                $nama_file = date("YmdHis") .$file_ktpistri->getClientOriginalName();
                $file_ktpistri->move('dokumen/KTP ISTRI (Pasangan)/', $nama_file);
                $validatedData['dokumen_ktpistri'] = 'dokumen/KTP ISTRI (Pasangan)/' .$nama_file;
            }

            if ($file_kk)
            {
                $nama_file = date("YmdHis") .$file_kk->getClientOriginalName();
                $file_kk->move('dokumen/KK/', $nama_file);
                $validatedData['dokumen_kk'] = 'dokumen/KK/' .$nama_file;
            }


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['province_id'] = $request->province_id;
        $validatedData['regency_id'] = $request->regency_id;

        $recruitsku = recruitsku::create($validatedData);
        $jumlah= count($request->kab_asal);
        $jumlah= count($request->kab_tiba);
        $jumlah= count($request->org_transport);
        $jumlah= count($request->org_cefetaria);
        $jumlah= count($request->kolom1);
        $jumlah= count($request->kolom2);
        $jumlah= count($request->total_cafetaria);
        $jumlah= count($request->total_transport);
        $jumlah= count($request->total);

        for($i = 0; $i<$jumlah; $i++){
            Perjalanan::create([
                'recruitsku_id' => $recruitsku->id,
                // 'nama' => $request->perjalanan_nama,
                'kab_asal' =>  $request->kab_asal[$i],
                'kab_tiba' =>  $request->kab_tiba[$i],
                'org_transport'     =>  $request->org_transport[$i],
                'org_cefetaria'     =>  $request->org_cefetaria[$i],
                'kolom1'            => $request->kolom1[$i],
                'kolom2'             => $request->kolom2[$i],
                'total_cafetaria'    =>  $request->total_cafetaria[$i],
                'total_transport'    =>  $request->total_transport[$i],
                'total'              =>  $request->total[$i],
            ]);
        }


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
