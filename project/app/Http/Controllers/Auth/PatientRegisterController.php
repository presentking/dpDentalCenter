<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class PatientRegisterController extends Controller
{
    public function register()
    {
        return view('auth.registerPatient');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Patient::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $patient = Patient::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($patient));
        Auth::guard('patient')->login($patient);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
