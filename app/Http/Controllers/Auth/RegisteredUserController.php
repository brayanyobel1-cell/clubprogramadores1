<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'us_nombre' => ['required', 'string', 'max:100'],
        'us_apellido' => ['required', 'string', 'max:100'],
        'us_email' => ['required', 'string', 'lowercase', 'email', 'max:150', 'unique:'.User::class.',us_email'],
        'us_password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
        'us_nombre' => $request->us_nombre,
        'us_apellido' => $request->us_apellido,
        'us_email' => $request->us_email,
        'us_password' => Hash::make($request->us_password),
        'fecha_registro' => now(),
        'rol_id' => 2, // Por defecto rol "Desarrollador"
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('home', absolute: false));
}
}
