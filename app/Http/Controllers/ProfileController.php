<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.profile.index')->with('users', $users)->with('title', 'Users List');
    }
    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {
        $user = User::find($id);
        return view('admin.profile.edit')->with([
            'id' => $id,
            'title' => 'Update User',
            'user' => $user,
            'action' => route('profile.update', $id)
        ]);
    }

    public function create()
    {
        return view('admin.profile.create')->with([
            'title' => 'Register',
            'action' => route('register')
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);
        $data = User::find($id);
        if ($request->password == NULL) {
            $data->fill($request->only('name', 'email'));
        } else {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $request->password = Hash::make($request->password);
            $data->fill($request->all());
        }
        // dd($request);
        $data->update();

        return Redirect::route('profile.index')->with('success.message', 'Perfil atualizado!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        User::destroy($id);
        return Redirect::route('profile.index')->with('success.message', 'Usuário excluído com sucesso!');
    }
}
