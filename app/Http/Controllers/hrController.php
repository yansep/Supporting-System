<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Regency;
use App\Models\Province;
use App\Models\Perjalanan;
use App\Models\recruitsku;
use Illuminate\Http\Request;
use App\Models\Lokasi_estate;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        //     {
            //      $search = $request->search;
            //     $tanggal_verif = date("Y-m-d");
            //     $recruitskus['start'] = $request->query('start');
            //     $recruitskus['end'] = $request->query('end');

            //     $recruitskus = recruitsku::when($search, function($query, $search){
            //         return $query->where('nama','LIKE',"%{$search}%")
            //         ->orWhere('nik', 'LIKE',"%{$search}%");
            //     })->paginate(5);

            //    return view('dashboard.hr.index',[
            //        'recruitskus' => $recruitskus,
            //        'tanggal_verif'=> $tanggal_verif,
            //        'start'=> $recruitskus,
            //        'end'=> $recruitskus,created_at
            //    ]);
                    /*return view ('dashboard.hr.index', [
                        'recruitskus' => recruitsku::all()
                    ]);*/
        //    }
        $recruitskus['lokasi_estates']=Lokasi_estate::all();
        $recruitskus['lokasi_estate_id'] = $request->query('lokasi_estate_id');
        $recruitskus['ketklaim'] = $request->query('ketklaim');
        $recruitskus['status'] = $request->query('status');
        $recruitskus['start'] = $request->query('start');
        $recruitskus['end'] = $request->query('end');

        $recruitskus['recruitsku']=recruitsku::all();
        $recruitskus['q'] = $request->query('q');
        $q = $request->q;
        $ketklaim = $request->ketklaim;
        $status = $request->status;
        $recruitskus['tanggal_verif'] = date("YY-MM-DD hh:mm:ss");

         $query = recruitsku::select('recruitskus.*')
                ->join('users', 'users.id', '=', 'recruitskus.user_id')
                ->join('lokasi_estates', 'lokasi_estates.id', '=', 'users.lokasi_estate_id')
                ;

        // $query = recruitsku::join('users', 'users.id', '=', 'recruitskus.user_id')
            //         ->join('lokasi_estates', 'lokasi_estates.id', '=', 'users.lokasi_estate_id')
            //         ->when($q, function($query, $q)
            //             {return $query->where('nama','LIKE',"%{$q}%")
            //         ->orWhere('nik', 'LIKE',"%{$q}%");})
            //             ->when($status, function ($query, $status) {
            //                 return $query->where('status', 'like', "%{$status}%");})
            //                     ->when($lokasi_estate_id, function ($query, $lokasi_estate_id) {
        // return $query->where('lokasi_estate_id', 'like', "%{$lokasi_estate_id}%");});

        if($recruitskus['lokasi_estate_id'])
        $query->where('lokasi_estates.id', $recruitskus['lokasi_estate_id']);

        if($ketklaim)
        $query->where('recruitskus.ketklaim', 'like', "{$ketklaim}");

        if($recruitskus['status'])
        $query->where('recruitskus.status', 'like', "{$status}");

        if($recruitskus['start'])
        $query->where('recruitskus.created_at', '>=', $recruitskus['start']);

        if($recruitskus['end'])
        $query->where('recruitskus.created_at', '<=', $recruitskus['end']);

        if($recruitskus['q'])
        $query->where('recruitskus.nama', 'like', "%{$q}%")->orWhere('recruitskus.nik', 'LIKE',"%{$q}%");


        $recruitskus['recruitskus'] = $query->paginate(10);
       return view('dashboard.hr.index',$recruitskus);
    }


    public function print($id)
    {
        $id = 1;
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->first();
        return view('dashboard.print',[
            'recruitskus' => recruitsku::all(),
            'perjalanan' => $perjalanan,
        ]);
    }

    public function downloadpdf(Request $request)
    {
        $ids = $request->input('ids');
        $recruitskus = collect();
        $perjalanan = collect();
        $biaya_perjalanan = 0;
        $total_biaya = 0;

        foreach($ids as $id){
            $recruitskus= $recruitskus->concat(
                recruitsku::where('id','=',$id)->get()
            );
            $perjalanan = $perjalanan->concat(
                $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->get()
            );
            $biaya_perjalanan = DB::table('perjalanans')->where('recruitsku_id','=',$id)->sum('total');
            $total_biaya = $biaya_perjalanan + $total_biaya;
        }

        $pdf = Pdf::loadView('dashboard.downloadpdf',[
            'recruitskus' => $recruitskus,
            'perjalanan' => $perjalanan,
            'total_biaya' => $total_biaya,
        ])->setPaper('a4', 'landscape');

        $result = $pdf->getDomPDF();
        $canvas = $result->get_canvas();
        $path = 'newFileName.pdf';
        Storage::disk('local')->put($path, $pdf->output()) ;

        $oMerger = PDFMerger::init();

        $oMerger->addPDF(Storage::disk('local')->path($path), 'all');
        foreach($recruitskus as $r){
            $doc_ktp = str_replace('\\', '/', public_path($r->dokumen_ktp));
            $doc_ktpistri = str_replace('\\', '/', public_path($r->dokumen_ktpistri));
            $doc_kk = str_replace('\\', '/', public_path($r->dokumen_kk));
            $oMerger->addPDF($doc_ktp, 'all');
            $oMerger->addPDF($doc_ktpistri, 'all');
            $oMerger->addPDF($doc_kk, 'all');
        }


        $oMerger->merge();
        $oMerger->save(public_path('/dokumen/data_merge/result_merge.pdf'));
        $oMerger->download();
        return  response()->download(public_path('/dokumen/data_merge/result_merge.pdf'));

    }

    public function mergepdf($id){

        $recruitskus=recruitsku::where('id','=',$id)->get();
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->get();
        $total_biaya = DB::table('perjalanans')->where('recruitsku_id','=',$id)->sum('total');
        $pdf = Pdf::loadView('dashboard.pdf_create',[
            'recruitskus' => $recruitskus,
            'perjalanan' => $perjalanan,
            'total_biaya' => $total_biaya,
        ])->setPaper('a4', 'landscape');

        $result = $pdf->getDomPDF();
        $canvas = $result->get_canvas();
        $path = 'newFileName.pdf';
        Storage::disk('local')->put($path, $pdf->output()) ;

        $oMerger = PDFMerger::init();

        $oMerger->addPDF(Storage::disk('local')->path($path), 'all');
        foreach($recruitskus as $r){
            $doc_ktp = str_replace('\\', '/', public_path($r->dokumen_ktp));
            $doc_ktpistri = str_replace('\\', '/', public_path($r->dokumen_ktpistri));
            $doc_kk = str_replace('\\', '/', public_path($r->dokumen_kk));
        }
        $oMerger->addPDF($doc_ktp, 'all');
        $oMerger->addPDF($doc_ktpistri, 'all');
        $oMerger->addPDF($doc_kk, 'all');

        $oMerger->merge();
        $oMerger->save(public_path('/dokumen/data_merge/result_merge.pdf'));
        $oMerger->download();
        return  response()->download(public_path('/dokumen/data_merge/result_merge.pdf'));
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
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->get();
        return view('dashboard.hr.show',[
            'recruitskus' => $recruitskus,
            'perjalanan' => $perjalanan,
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
        $tanggal_verif = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $recruitskus=recruitsku::find($id);
        $perjalanan = Perjalanan::where('recruitsku_id','=',$id)->get();
        // return view('dashboard.hr.edit',compact('recruitskus'));//
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('dashboard.hr.edit', [
            'recruitskus' => $recruitskus,
            'tanggal_verif' => $tanggal_verif,
            'perjalanan' => $perjalanan,
            'province' => $provinces,
            'regency' => $regencies,
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
            'status' => 'max:255',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx|file|max:2024',
        ]);
        $validatedData['province_id'] = $request->province_id;
        $validatedData['regency_id'] = $request->regency_id;
        $validatedData['tanggal_verif'] = $request->tanggal_verif;
        $recruitskus= recruitsku::find($id)->update($validatedData);

        $file = $request->file('dokumen');
        if ($file)
        {
            $nama_file = $file->getClientOriginalName();
            $file->move('dokumen/', $nama_file);
            $validatedData['dokumen'] = 'dokumen/' .$nama_file;
        }

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

    public function hitung(Request $request)
    {
        $sku = recruitsku::count();
        return view ('home.home',compact('sku'));
    }
}
