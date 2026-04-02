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
            'first_name' => ['required','string','max:255'],
    'last_name' => ['required','string','max:255'],
    'email' => ['required','email','max:255','unique:users'],
    'role' => ['required','in:responsable,manager,consultant'],
    'password' => ['required','confirmed','min:8'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
    'last_name' => $request->last_name,
    'email' => $request->email,
    'role' => $request->role,
    'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
