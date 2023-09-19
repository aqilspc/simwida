<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Session;
class Attemp extends Controller
{


    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $user = DB::table('users')->where('username',$request->username_input)->first();
        $arr = [];
        if($user)
        {
            if (!Hash::check($request->password, $user->password))
            {
                return redirect()->back()->with('error','Mohon maaf password yang anda masukkan salah, mohon cek kembali!');
            }

            $user = User::find($user->id);
            Auth::login($user);
            return redirect('home');
        }
        return redirect()->back()->with('error','Mohon maaf username anda tidak ditemukan, mohon cek kembali!');
    }

    public function logoutUser(Request $request)
    {
        Session::flush();
        
        Auth::logout();
        return redirect('/login');
    }
}
