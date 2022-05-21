<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Login Admin',
            "active" => "login",
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns|unique:drivers',
            'username' => 'required|min:5|max:255|',
            'password' => 'required|min:8|max:255',
            'carsAvailability' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Convert Array to String for checkbox
        $arrayToString = implode(', ', $request->input('carsAvailability'));
        $validated['carsAvailability'] = $arrayToString;

        Driver::create($validated);

        return redirect('/login')->with('success', 'Registration was successful!');
    }
}
