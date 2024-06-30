<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\Auth\LoginRequest;

class UsuarioController extends Controller
{
    public function cadastrar(Request $request): JsonResponse
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
            return response()->json(['message' => 'Registered successfully'], 201);
        }

        return response()->json(['message' => 'Registered successfully'], 201);
    }

    
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
