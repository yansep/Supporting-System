<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth, Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function index()
    {

      return view('change-password');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
          'current_password' => 'required',
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required',
        ]);

        $user = User::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }

        $user->password = User::make($request->password);
        $user->save();

        return back()->with('success', 'Password successfully changed!');
    }
}
