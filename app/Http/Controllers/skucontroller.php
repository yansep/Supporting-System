<?php

namespace App\Http\Controllers;


use App\Models\Regency;
use App\Models\Province;
use App\Models\Perjalanan;
use App\Models\recruitsku;
use Illuminate\Http\Request;
use Carbon\Carbon;

class skucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('PGS');
            //         $provinces = Province::all();
            //         $regencies = Regency::all();
            //         //return recruitsku::where('user_id', auth()->user()->id)->get();
            //         $provinces = Province::all();
            //         $regencies = Regency::all();
            //         $recruitskus['recruitsku']=recruitsku::all();
            //         $recruitskus['q'] = $request->query('q');
            //         $q = $request->q;
            //         $statuspgs = $request->statuspgs;
            //         $start = $request->start;
            //         $recruitskus['tanggal_verif'] = date("YY-MM-DD hh:mm:ss");
            //         $recruitskus['statuspgs'] = $request->query('statuspgs');
            //         $recruitskus['start'] = $request->query('start');
            //         $recruitskus['end'] = $request->query('end');


            //         if( $search = $request->search)
            //          {
            //             //$recruitskus = recruitsku::where('nik','LIKE','%' . $request->search. '%')->Paginate(5);
            //             $recruitskus = recruitsku::
            //             when($search, function($query, $search)
            //             {
            //                 return $query->where('user_id', auth()->user()->id) ->where('nama','LIKE',"%{$search}%")
            //                 ->orWhere('nik', 'LIKE',"%{$search}%")->where('user_id', auth()->user()->id);
            //             })->paginate(5);
            //         }
            //          else{
            //             $recruitskus = recruitsku::where('user_id', auth()->user()->id)->Paginate(5);
            //          }

            //         return view('dashboard.sku.index',[
            //             'recruitskus' => $recruitskus,
            //             'province' => $provinces,
            //             'regency' => $regencies,
        // ]);

        // $this->authorize('PGS');
            // $provinces = Province::all();
            // $regencies = Regency::all();
            // $recruitskus=recruitsku::all();
            // $recruitskus['q'] = $request->query('q');
            // $q = $request->q;
            // $statuspgs = $request->statuspgs;
            // $start = $request->start;
            // $end = $request->end;
            // $recruitskus['tanggal_verif'] = date("YY-MM-DD hh:mm:ss");
            // $recruitskus['statuspgs'] = $request->query('statuspgs');
            // $recruitskus['start'] = $request->query('start');
            // $recruitskus['end'] = $request->query('end');


            // $data = recruitsku::select('recruitskus.*')
            //                 ->join('perjalanans', 'perjalanans.recruitsku_id', '=', 'recruitskus.id');

            //                 if($recruitskus['statuspgs'])
            //                     $data->where('recruitskus.statuspgs', 'like', "%{$statuspgs}%")->where('user_id', auth()->user()->id);

            //                     if($start)
            //                     $data->where('recruitskus.created_at', '>=', $start);

            //                     if($end)
            //                     $data->where('recruitskus.created_at', '<=', $end);

            //                     if($recruitskus['q'])
            //                     $data->where('recruitskus.nama', 'like', "%{$q}%")->orWhere('recruitskus.nik', 'LIKE',"%{$q}%")->where('user_id', auth()->user()->id);

            // $recruitskus= $data->where('user_id', auth()->user()->id)->paginate(5);
            // return view('dashboard.sku.index',[
            //     'recruitskus' =>$recruitskus,
            //     'province' => $provinces,
            //     'regency' => $regencies,
            //     // 'start' => $start,
            //     // 'end' => $end,
            //     // 'q'=>$q,
        //     ]);
        $recruitskus['ketklaim'] = $request->query('ketklaim');
        $recruitskus['statuspgs'] = $request->query('statuspgs');
        $recruitskus['start'] = $request->query('start');
        $recruitskus['end'] = $request->query('end');
        $recruitskus['q'] = $request->query('q');
        $q = $request->q;
        $ketklaim = $request->ketklaim;
        $statuspgs = $request->statuspgs;
        $recruitskus['tanggal_verif'] = date("YY-MM-DD hh:mm:ss");

         $query = recruitsku::select('recruitskus.*')
                ->join('users', 'users.id', '=', 'recruitskus.user_id');

        if($ketklaim)
        $query->where('recruitskus.ketklaim', 'like', "{$ketklaim}");

        if($recruitskus['statuspgs'])
        $query->where('recruitskus.statuspgs', 'like', "{$statuspgs}");

        if($recruitskus['start'])
        $query->where('recruitskus.created_at', '>=', $recruitskus['start']);

        if($recruitskus['end'])
        $query->where('recruitskus.created_at', '<=', $recruitskus['end']);

        if($recruitskus['q'])
        $query->where('recruitskus.nama', 'like', "%{$q}%")->orWhere('recruitskus.nik', 'LIKE',"%{$q}%");

        $recruitskus['recruitskus'] = $query->where('user_id', auth()->user()->id)->paginate(5);

       return view('dashboard.sku.index',$recruitskus);
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
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->get();
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('dashboard.sku.show',[
            'recruitskus' => $recruitskus,
            'perjalanan' => $perjalanan,
            'province' => $provinces,
            'regency' => $regencies,
        ]);
    }

    public function editinvoice($id)
    {
        $recruitskus=recruitsku::find($id);
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->first();
        $tanggal_verif = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('dashboard.sku.editinvoice', [
            'recruitskus' => $recruitskus,
            'perjalanan' => $perjalanan,
            'province' => $provinces,
            'regency' => $regencies,
            'tanggal_verif'=> $tanggal_verif,
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
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->get();
        $tanggal_verif = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('dashboard.sku.edit', [
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
            'PT' => 'max:255',
            'estate' => 'max:255',
            'statuspgs' => 'max:255',
            'status' => 'max:255',
            'statushrhead' => 'max:255',
            'statuscma' => 'max:255',
            'statusgahead' => 'max:255',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['province_id'] = $request->province_id;
        $validatedData['regency_id'] = $request->regency_id;
        $validatedData['tanggal_verif'] = $request->tanggal_verif;
        $recruitskus= recruitsku::find($id)->update($validatedData);

        $perjalanan = Perjalanan::where('recruitsku_id','=',$request->recruitsku_id)->get();
        foreach($perjalanan as $perjalanan)
        {
            Perjalanan::where('id','=',$perjalanan->id)->update([
                'kab_asal' =>  $request->kab_asal[$perjalanan->id],
                'kab_tiba' =>  $request->kab_tiba[$perjalanan->id],
                'org_transport'     =>  $request->org_transport[$perjalanan->id],
                'org_cefetaria'     =>  $request->org_cefetaria[$perjalanan->id],
                'kolom1' =>  $request->kolom1[$perjalanan->id],
                'kolom2' =>  $request->kolom2[$perjalanan->id],
                'total_cafetaria'    =>  $request->total_cafetaria[$perjalanan->id],
                'total_transport'    =>  $request->total_transport[$perjalanan->id],
                'total'              =>  $request->total[$perjalanan->id],
            ]);
        }
        if($request->new_kab_asal){
            $jumlah = count($request->new_kab_asal);
            for($i = 0; $i<$jumlah; $i++){
                $index = $i+10000;
                Perjalanan::create([
                    'recruitsku_id' => $request->recruitsku_id,
                    // 'nama' => $request->perjalanan_nama,
                    'kab_asal' =>  $request->new_kab_asal[$index],
                    'kab_tiba' =>  $request->new_kab_tiba[$index],
                    'org_transport'     =>  $request->new_org_transport[$index],
                    'org_cefetaria'     =>  $request->new_org_cefetaria[$index],
                    'kolom1'            => $request->new_kolom1[$index],
                    'kolom2'             => $request->new_kolom2[$index],
                    'total_cafetaria'    =>  $request->new_total_cafetaria[$index],
                    'total_transport'    =>  $request->new_total_transport[$index],
                    'total'              =>  $request->new_total[$index],
                ]);
            }
        }

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
