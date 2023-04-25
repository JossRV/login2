<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest'])->only('index');
    }
    public function index()
    {
        return view('modules/login/index');
    }
    public function logeo(Request $request)
    {
        $credenciales = $request->only("name", "password");
        if (Auth::attempt($credenciales)) {
            if (auth()->user()->rol == 'admin') {
                return redirect()->route('admin_index');
            } else if (auth()->user()->rol == 'user') {
                return redirect()->route('user_index');
            }
            // else {
            //     return $this->logout();
            // }
        } else {
            return back()->withInput($credenciales);
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
    public function agregarUsuario()
    {
        $item = new User();
        $item->name = 'faty';
        $item->password = Hash::make('12345');
        $item->rol = 'admin';
        $item->save();
        return $item;
    }
}
