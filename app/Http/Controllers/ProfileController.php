<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
   public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // Preencher os campos validados do formulário no usuário
    $user->fill($request->validated());

    // Adicionar manualmente os novos campos ao objeto user
    $user->nacionalidade = $request->input('nacionalidade');
    $user->profissao = $request->input('profissao');
    $user->numero_bi = $request->input('numero_bi');
    $user->morada = $request->input('morada');
    $user->telefone = $request->input('telefone');

    // Verificar se o email foi alterado e, se sim, resetar a verificação
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // Salvar as alterações
    $user->save();

    // Redirecionar de volta à página de edição do perfil com uma mensagem de sucesso
    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
