<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        if (Auth::guard('web')->check()) {
            return redirect('admin');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required',
        ], [
            'email.exists' => trans('login.This mail is not registered'),
            'email.required' => trans('login.Please enter your e-mail'),
            'password.required' => trans('login.Please enter your password'),
        ]);
        if (Auth::guard('web')->attempt($data)) {
            return response()->json(200);
        }
        return response()->json(405);
    }

    public function logout()
    {

            Auth::logout();
            return redirect()->route('admin.login');
    }

}//end class
