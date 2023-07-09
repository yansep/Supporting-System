<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Perjalanan;
use App\Models\recruitsku;
use Illuminate\Http\Request;
use App\Models\Lokasi_estate;

class cmacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('CMA');
        // $search = $request->search;
            // $data = recruitsku::when($search, function($query, $search){
            //                         return $query->Where('nama','LIKE',"%{$search}%")
            //                         ->orWhere('nik', 'LIKE',"%{$search}%");
            //                         })-> where('user_id',auth()->user()->lokasi_id);

            //     $recruitskus['recruitskus'] = $data->paginate(5);
        //     return view('dashboard.cma.index',$recruitskus);

        $recruitskus['lokasi_estates']= Lokasi_estate::all();
        $recruitskus['lokasi_estate_id'] = $request->query('lokasi_estate_id');
        $recruitskus['ketklaim'] = $request->query('ketklaim');
        $recruitskus['statuscma'] = $request->query('statuscma');
        $recruitskus['start'] = $request->query('start');
        $recruitskus['end'] = $request->query('end');
        $recruitskus['q'] = $request->query('q');
        $q = $request->q;
        $ketklaim = $request->ketklaim;
        $statuscma = $request->statuscma;
        $recruitskus['tanggal_verif'] = date("YY-MM-DD hh:mm:ss");

         $query = recruitsku::
                select('recruitskus.*')-> where('users.lokasi_id',auth()->user()->lokasi_id)
                ->join('users', 'users.id', '=', 'recruitskus.user_id')
                ->join('lokasi_estates', 'lokasi_estates.id', '=', 'users.lokasi_estate_id');
                // ->join('perjalanans', 'perjalanans.recruitsku_id', '=', 'recruitskus.id');


        if($recruitskus['lokasi_estate_id'])
        $query->where('lokasi_estates.id', $recruitskus['lokasi_estate_id']);

        if($ketklaim)
        $query->where('recruitskus.ketklaim', 'like', "{$ketklaim}");

        if($recruitskus['statuscma'])
        $query->where('recruitskus.statuscma', 'like', "%{$statuscma}%");

        if($recruitskus['start'])
        $query->where('recruitskus.created_at', '>=', $recruitskus['start']);

        if($recruitskus['end'])
        $query->where('recruitskus.created_at', '<=', $recruitskus['end']);

        if($recruitskus['q'])
        $query->where('recruitskus.nama', 'like', "%{$q}%")->orWhere('recruitskus.nik', 'LIKE',"%{$q}%");

        $lokasis= Lokasi::all();
        $recruitskus['recruitskus'] = $query
                                            ->where('recruitskus.status', 'Approvee')
                                            ->paginate(5);

       return view('dashboard.cma.index',$recruitskus);


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
        $tanggal_verif = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $recruitskus=recruitsku::find($id);
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->get();
        return view('dashboard.cma.edit',[
            'recruitskus' => $recruitskus,
            'tanggal_verif' => $tanggal_verif,
            'perjalanan' => $perjalanan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recruitsku $recruitsku, $id)
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
            'kolom1' => 'max:255',
            'kolom2' => 'max:255',
            'total' => 'max:255',

            'keterangan' => 'max:255',
            'PT' => 'max:255',
            'estate' => 'max:255',
            'statuscma' => 'max:255',
        ]);

        $validatedData['tanggal_verif'] = $request->tanggal_verif;
        $recruitskus= recruitsku::find($id)->update($validatedData);
        return redirect('/dashboard/cma')->with('success', 'Berhasil di Ubah!');
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
        return redirect('/dashboard/cma')->with('success', 'Data Telah Dihapus!');
    }
}
