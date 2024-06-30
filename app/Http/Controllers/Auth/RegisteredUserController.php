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
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
        'nacionalidade' => 'nullable|string|max:255',
        'profissao' => 'nullable|string|max:255',
        'numero_bi' => 'nullable|string|max:255',
        'morada' => 'nullable|string|max:255',
        'telefone' => 'nullable|string|max:255',
    ]);

        $user = User::create([
            'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'nacionalidade' => $request->nacionalidade,
        'profissao' => $request->profissao,
        'numero_bi' => $request->numero_bi,
        'morada' => $request->morada,
        'telefone' => $request->telefone,
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($request->user()->tipo === 'admin') {
            
            return redirect('admin/dashboard');
        }

        return redirect(route('home', absolute: false));
    }
}
