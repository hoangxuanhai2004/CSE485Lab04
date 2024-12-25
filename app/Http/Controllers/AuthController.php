<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('name', 'password');

    
    if (Auth::attempt($credentials)) {
        // Đăng nhập thành công
        return redirect()->route('books.index');
    }

    // Đăng nhập thất bại
    return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không chính xác.');
        
    }

}
