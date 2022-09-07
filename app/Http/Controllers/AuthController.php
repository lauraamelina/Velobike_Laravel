<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class AuthController extends Controller
{

    /**
     * @return Factory|View|Application
     */
    public function loginForm(): Factory|View|Application
    {
        return view('auth/login');
    }

    /**
     * Graba el formulario de Login
     * @param Request $request
     * @return RedirectResponse
     */
    public function loginGrabar(Request $request): RedirectResponse
    {
        $credenciales = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ];

        if(!Auth::attempt($credenciales)) {
            return redirect()
                ->route('login.form')
                ->withInput(
                    $request->except('password')
                )
                ->with('message.error', 'Error de inicio de sesión. El email y/o contraseña no coinciden.');
        }

        return redirect()
            ->route('home')
            ->with('message.success', 'Iniciaste sesión con éxito');

    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()
            ->route('login.form')
            ->with('message.success', 'Sesión cerrada con éxito');
    }

    public function registroForm(): Factory|View|Application
    {
        return view('auth/registro');
    }


    /**
     * Graba el formulario de registro.
     * @param Request $request
     * @return RedirectResponse
     */
    public function registroGrabar(Request $request): RedirectResponse
    {
        $request->validate(User::$rules, User::$rulesMessage);
        User::create($request->only("name", "email") + ["password" => Hash::make($request->password)]);
        return redirect()
            ->route('login.form')
            ->with('message.success', 'Se ha registrado el usuario correctamente.');
    }
}
