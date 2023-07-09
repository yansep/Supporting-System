<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Perjalanan;
use App\Models\recruitsku;
use Illuminate\Http\Request;
use App\Models\Lokasi_estate;

class gacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
                $this->authorize('GA HEAD');
            //     $search = $request->search;

                //     $recruitskus = recruitsku::when($search, function($query, $search)
                //                     {return $query->where('nama','LIKE',"%{$search}%")
                //                     ->orWhere('nik', 'LIKE',"%{$search}%")->where('ketklaim', 'Invoice')-> where('status', 'Approve')
                //                     -> orwhere('status', 'Approvee');})->paginate(10);

                //    return view('dashboard.ga.index',[
                //        'recruitskus' => $recruitskus,
            //    ]);
            $recruitskus['lokasi_estates']= Lokasi_estate::all();
            $recruitskus['lokasi_estate_id'] = $request->query('lokasi_estate_id');
            $recruitskus['statusgahead'] = $request->query('statusgahead');
            $recruitskus['start'] = $request->query('start');
            $recruitskus['end'] = $request->query('end');
            $recruitskus['q'] = $request->query('q');
            $q = $request->q;
            $statusgahead = $request->statusgahead;
            $recruitskus['tanggal_verif'] = date("YY-MM-DD hh:mm:ss");

            $query = recruitsku::where('recruitskus.status', 'Approve')
            ->where('recruitskus.ketklaim', 'Invoice')
            ->OrWhere('recruitskus.statusgahead', 'Approve')
            ->select('recruitskus.*')
            ->join('users', 'users.id', '=', 'recruitskus.user_id')
            ->join('lokasi_estates', 'lokasi_estates.id', '=', 'users.lokasi_estate_id');


            if($recruitskus['lokasi_estate_id'])
            $query->where('lokasi_estates.id', $recruitskus['lokasi_estate_id']);

            if($recruitskus['statusgahead'])
            $query->where('recruitskus.statusgahead', 'like', "{$statusgahead}");

            if($recruitskus['start'])
            $query->where('recruitskus.created_at', '>=', $recruitskus['start']);

            if($recruitskus['end'])
            $query->where('recruitskus.created_at', '<=', $recruitskus['end']);

            if($recruitskus['q'])
            $query->where('recruitskus.nama', 'like', "%{$q}%")->orWhere('recruitskus.nik', 'LIKE',"%{$q}%");


            $recruitskus['recruitskus'] = $query->paginate(10);

        return view('dashboard.ga.index',$recruitskus);
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
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->get();
        $tanggal_verif = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('dashboard.ga.edit',[
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

            'tanggal' => 'max:255',
            'keterangan' => 'max:255',
            'PT' => 'max:255',
            'estate' => 'max:255',
            'statusgahead' => 'max:255',
        ]);


        $recruitskus= recruitsku::find($id)->update($validatedData);
        $validatedData['tanggal_verif'] = $request->tanggal_verif;
        return redirect('/dashboard/ga')->with('success', 'Berhasil di Ubah!');
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
