<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lokasi;
use App\Models\Lokasi_estate;
use App\Models\recruitsku;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('ADMIN');
        return view('dashboard.admin.index',[
            'users' => User::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.admin.create',[
            'users' => User::all(),
            'roles'=> Role::all(),
            'lokasis' => Lokasi::all(),
            'estates' => Lokasi_estate::all(),

        ]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'npk' => 'required|max:7|unique:users',
            'password' => 'required|max:255',
            'PT' => 'max:255',
            'estate' => 'max:255',
        ]);

       // $validatedData['password'] = bcrypt($validatedData['password']);
       $validatedData['password'] = Hash::make($validatedData['password']);
       $validatedData['role_id'] = $request->role_id;
       $validatedData['lokasi_id'] = $request->lokasi_id;
        $validatedData['lokasi_estate_id'] = $request->lokasi_estate_id;

        User::create($validatedData);
        return redirect('/dashboard/admin')->with('success', 'Berhasil di tambahkan!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('dashboard.admin.edit',[
            'users' => User::find($id),
            'roles'=> Role::all(),
            'lokasis' => Lokasi::all(),
            'lokasi_estates' => Lokasi_estate::all(),
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
            'username' => 'required|max:255',
            'npk' => 'required|max:7',
            'password'=> 'required|max:255',
            'PT' => 'max:255',
            'estate' => 'max:255',
        ]);
        $validatedData['lokasi_id'] = $request->lokasi_id;
        $validatedData['role_id'] = $request->role_id;
        $validatedData['lokasi_estate_id'] = $request->lokasi_estate_id;
        $users= User::find($id)->update($validatedData);
        return redirect('/dashboard/admin')->with('success', 'Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users=User::find($id);
        $users->delete();
        return redirect('/dashboard/admin')->with('success', 'Data Telah Dihapus!');
    }
}
