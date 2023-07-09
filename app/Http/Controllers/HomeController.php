<?php

namespace App\Http\Controllers;

use App\Models\recruitsku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view ('home.home',[
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

}
