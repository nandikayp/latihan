<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;

class RegisterCon extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function actionregister(Request $request)
    {
        
        DB::table('users')->insert([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',

        ]);
        Session::flash('message', 'Register Berhasil. Akun Anda suda Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
}
