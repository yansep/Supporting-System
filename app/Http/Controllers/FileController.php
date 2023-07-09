<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RoleAkses;
use ZipArchive;
use App\Models\File;
use App\Models\Lokasi;
use App\Models\Lokasi_estate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use App\Models\User;



class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        //yang bisa akses create dan destroy hanya FA dan admin
        $this->middleware(RoleAkses::class)->only('create', 'destroy');
    }

    public function index(Request $request)
    {
            // $keyword = $request->input('keyword');
                // $files = File::when($keyword, function ($query, $keyword)   {
            //     return $query->where('title', 'LIKE', "%$keyword%");    })->get();

            if (auth()->user()->role_id != 1 && auth()->user()->role_id != 2) {
                // //Lakukan tindakan untuk pengguna lainnya
                //     $keyword = $request->input('keyword');
                //     $startDate = $request->input('start_date');
                //     $endDate = $request->input('end_date');
                //     $lokasi_estates = $request->input('lokasi_estate');
                //     $files['lokasi_estate_id'] = $request->query('lokasi_estate_id');
                //     $files = File::all();

                //     // // Parsing tanggal menggunakan Carbon
                //     // $parsedStartDate = Carbon::parse($startDate)->startOfDay();
                //     // $parsedEndDate = Carbon::parse($endDate)->endOfDay();

                //     // Query untuk pencarian berdasarkan nama file dan tanggal
                //     $files = File::where(function ($query) use ($keyword) {
                //         $query->where('filename', 'LIKE', '%' . $keyword . '%')
                //             ->orWhere('title', 'LIKE', '%' . $keyword . '%')
                //             ;
                //     })
                //     ->where('files.lokasi_estate_id',auth()->user()->lokasi_estate_id)
                //     ->get();

                //     // Mendapatkan ID file yang sesuai dengan filter pencarian
                //     $fileIds = $files->pluck('id')->toArray();

                //     // Tampilkan view dengan hasil pencarian
                //     return view('files.index', compact('files',  'fileIds'));
                // //

                $query = $request->input('query');
                $searchRole = $request->get('lokasi_estate_id');
                $startDate = $request->input('startDate');
                $endDate = $request->input('endDate');

                $files = File::query();

                if ($query) {
                    $files->where('filename', 'LIKE', "%$query%")
                        ->orWhere('title', 'LIKE', '%' . $query . '%');
                }

                if ($searchRole) {
                    $files->where('lokasi_estate_id', $searchRole);
                }

                if($startDate)
                    $files->where('tanggal', '>=', $startDate);

                if($endDate)
                    $files->where('tanggal', '<=', $endDate);

                $files = $files->where('files.lokasi_estate_id',auth()->user()->lokasi_estate_id)->paginate(10);
                $roles = Lokasi_estate::all();

                return view('files.index', compact('files', 'query', 'searchRole', 'roles'));
            }
            else
            {
                // //Lakukan tindakan untuk pengguna lainnya
                //     $keyword = $request->input('keyword');
                //     $startDate = $request->input('start_date');
                //     $endDate = $request->input('end_date');
                //     $lokasi_estates = $request->input('lokasi_estate');
                //     $files['lokasi_estate_id'] = $request->query('lokasi_estate_id');
                //     $today = Carbon::today()->toDateString();
                //     $files = File::all();

                //     // // Parsing tanggal menggunakan Carbon
                //     // $parsedStartDate = Carbon::parse($startDate)->startOfDay();
                //     // $parsedEndDate = Carbon::parse($endDate)->endOfDay();

                //     // Query untuk pencarian berdasarkan nama file dan tanggal
                //     $files = File::where(function ($query) use ($keyword) {
                //         $query->where('filename', 'LIKE', '%' . $keyword . '%')
                //             ->orWhere('title', 'LIKE', '%' . $keyword . '%')
                //             ;})
                //     //
                //     // ->whereDate('tanggal', $today)
                //     ->select('files.*')
                //     ->get();


                //     // Mendapatkan ID file yang sesuai dengan filter pencarian
                //     $fileIds = $files->pluck('id')->toArray();

                //     // Tampilkan view dengan hasil pencarian
                //     return view('files.index', compact('files',  'fileIds'));
                // //

                // $query = $request->input('query');
                    // $startDate = $request->input('startDate');
                    // $endDate = $request->input('endDate');
                    // $selectedValue = $request->input('selected_value');
                    // $today = Carbon::today()->toDateString();
                    // $lokasi_estates = Lokasi_estate::all();
                    // $roleId = $request->input('lokasi_estate_id');
                    // $lokasi_estate_id = $request->get('lokasi_estate_id');

                    // $files = File::select('files.*')
                    //         ->where('filename', 'like', '%'.$query.'%')
                    //         ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                    //             return $query->whereBetween('tanggal', [$startDate, $endDate]);   })
                    //             ->get();

                // return view('files.index', compact('files'));

                $query = $request->input('query');
                $searchRole = $request->get('lokasi_estate_id');
                $startDate = $request->input('startDate');
                $endDate = $request->input('endDate');

                $files = File::query();

                if ($query) {
                    $files->where('filename', 'LIKE', "%$query%")
                        ->orWhere('title', 'LIKE', '%' . $query . '%');
                }

                if ($searchRole) {
                    $files->where('lokasi_estate_id', $searchRole);
                }

                if($startDate)
                    $files->where('tanggal', '>=', $startDate);

                if($endDate)
                    $files->where('tanggal', '<=', $endDate);

                $files = $files->paginate(3);
                $roles = Lokasi_estate::all();

                return view('files.index', compact('files', 'query', 'searchRole', 'roles'));
            }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create',[
            'lokasis' => Lokasi::all(),
            'estates' => Lokasi_estate::all(),
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
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'file|mimes:pdf'
        ]);
        foreach ($request->file('files') as $file) {
            File::create([
                'title' => $file->getClientOriginalName(),
                'filename' => $file,
                'lokasi_id' => $request->lokasi_id,
                'lokasi_estate_id' => $request->lokasi_estate_id,
                'tanggal' => $request->tanggal,
            ]);
        }

        return redirect()->route('files.index')->with('success', 'Files uploaded successfully.');
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
        // $file->delete('app/public/pdf/' . $file->filename);
        // return redirect()->route('files.index')->with('success', 'File deleted successfully.');
        // $filePath = public_path('app/pdf/' . $file->filename);

        $file=File::find($id);
        Storage::delete(['public/pdf/' . $file->filename]);
        $file->delete();
        return redirect()->route('files.index');

        // if (File::isFile($filePath)) {
        //     File::delete($filePath);
        //     return redirect()->back()->with('success', 'File PDF berhasil dihapus');
        // }

        // return redirect()->back()->with('error', 'File PDF tidak ditemukan');
    }

    public function deletePDF(File $file)
    {
    $filePath = public_path('/app/pdf/' . $file->filename);

    if (File::exists($filePath)) {
        File::delete($filePath);
        return redirect()->back()->with('success', 'File PDF berhasil dihapus');
    }

    return redirect()->back()->with('error', 'File PDF tidak ditemukan');
    }

    public function download(File $file)
    {
        $filePath = storage_path('app/public/pdf/' . $file->filename);
        return response()->download($filePath, $file->title);

    }


    public function downloadSelected(Request $request)
    {
        $selectedFiles = $request->input('selectedFiles');

        // Ambil data file yang dipilih dari database
        $files = File::whereIn('id', $selectedFiles)->get();

        // Mendapatkan path file yang disimpan
        $filePaths = $files->pluck('filename')->all();

        // Membuat array untuk menyimpan nama file
        $fileNames = [];

        // Mengambil nama file dari path
        foreach ($filePaths as $filePath) {
            $fileNames[] = pathinfo($filePath, PATHINFO_BASENAME);
        }

        // Meng-zip file-file yang dipilih
        $zipPath = 'downloads/files.zip';
        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($filePaths as $filePath) {
                if (Storage::exists($filePath)) {
                    $zip->addFile(storage_path('app/' . $filePath), pathinfo($filePath, PATHINFO_BASENAME));
                }
            }
            $zip->close();
        }

        // Menghapus file ZIP jika berhasil di-zip
        if (file_exists($zipPath)) {
            // Mengirimkan response ZIP untuk di-download
            return Response::download($zipPath)->deleteFileAfterSend();
        }

        // Jika terjadi kesalahan, lakukan redirect atau tampilkan pesan error
        return redirect()->back()->with('error', 'An error occurred while creating the ZIP file.');

    }

    public function downloadAll(Request $request)
    {
    $fileIds = explode(',', $request->input('fileIds'));

    $files = File::whereIn('id', $fileIds)->get();

    // Loop melalui setiap file untuk mengunduhnya
    foreach ($files as $file) {
        // Lakukan verifikasi dan validasi keamanan sebelum mengizinkan pengunduhan file
        // Misalnya, pastikan pengguna memiliki akses yang tepat, file dalam status yang benar, dll.

        // Unduh file menggunakan Storage
        $path = storage_path('app/public/' . $file->filename);
        if (file_exists($path)) {
            return response()->download($path);
        }
    }

    // Jika tidak ada file yang ditemukan, kembalikan pesan error atau redirect ke halaman sebelumnya
    // ...
    }



}
