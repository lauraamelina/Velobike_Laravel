<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;


class UsuariosController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function verPerfil (): Factory|View|Application
    {
        $carrito = Carrito::all();
        $usuario = auth()->user();
        return view('usuarios/perfil',[
            'usuario'=> $usuario,
            'carrito'=> $carrito,
        ]);
    }

    /**
     * Graba el formulario de editar perfil del usuario
     * @param Request $request
     * @return RedirectResponse
     */
    public function grabarPerfil (Request $request): RedirectResponse
    {
        $usuario = auth()->user();
        $request->validate(User::$rulesProfile, User::$rulesMessageProfile);
        $data = $request->all();
        $data['foto'] = $this->cargarImagen($request) ?? $usuario->foto;

        try {
            DB::transaction(function() use ($usuario, $data) {
                $usuario->update($data);
                DB::commit();
            });
        }catch (Exception) {
            DB::rollback();
            return redirect()
                ->route( 'perfil')
                ->with('message.error', 'No se pudo editar el perfil correctamente')
                ->withInput();
        }
        return redirect()
            ->route( 'perfil')
            ->with('message.success', 'Se editó tu perfil con éxito ');

    }


    /**
     * Guardar la imagen subida, si tiene éxito retorna el nombre del archivo, sino null.
     * @param Request $request
     * @param string $field
     * @return string|null
     */
    protected function cargarImagen(Request $request, string $field = 'foto'): ?string
    {
        if($request->hasFile($field) && $request->file($field)->isValid()){
            $filename = date('YmdHis') . "." . $request->file($field)->extension();
            Image::make($request->file($field))
                ->resize(200,200, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path('img/' . $filename));
            return $filename;
        }
        return null;
    }
}
