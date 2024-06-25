<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class PatientAuthController extends Controller
{
    public function login()
    {
        return view('auth.loginPatient');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);
        if(! Auth::guard('patient')->attempt($request->only('email', 'password')))
        {
            return redirect()->route('patient.login');
        }

        $request->session()->regenerate();
        return redirect('/');

    }

    public function logout(Request $request) {
        Auth::guard('patient')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
