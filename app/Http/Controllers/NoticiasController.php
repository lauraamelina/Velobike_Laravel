<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Noticia;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;

class NoticiasController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index (): Factory|View|Application
    {
        $noticias= Noticia::with(['categorias'])->paginate(2);
        return view('noticias/index',[
            'noticias'=> $noticias
        ]);
    }


    /**
     * @param $id
     * @return Factory|View|Application
     */
    public function ver ($id): Factory|View|Application
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.ver', [
            'noticia' => $noticia,
        ]);
    }


    /**
     * @return Factory|View|Application
     */
    public function agregarForm (): Factory|View|Application
    {
        $categorias = Categoria::all();
        return view('noticias/form_nuevo', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Graba los datos del formulario del alta de la noticia.
     * @param Request $request
     * @return RedirectResponse
     */
    public function grabarForm (Request $request): RedirectResponse
    {
        $request->validate(Noticia::$rules, Noticia::$rulesMessage);
        $data = $request->all();
        $data['imagen'] = $this->cargarImagen($request);

        DB::beginTransaction();
        try {
            $noticia = Noticia::create($data);
            $categorias = $data['categoria_id'] ?? [];
            $noticia->categorias()->attach($categorias);
            DB::commit();
        } catch (Exception) {
            DB::rollback();
            return redirect()
                ->route( 'noticias.agregar')
                ->with('message.error', 'No pudo eliminarse la noticia por un error en la base de datos.')
                ->withInput();
        }
        return redirect()
            ->route( 'admin.noticias')
            ->with('message.success', 'La noticia <b> "'.e($data['titulo']).'" </b> se agregó con éxito ');

    }

    /**
     * Elimina la noticia
     * @param int $id
     * @return RedirectResponse
     */
    public function eliminar (int $id): RedirectResponse
    {
        $noticia = Noticia::findOrFail($id);
        try {
            DB::transaction(function() use ($noticia) {
                $noticia->categorias()->detach();
                $noticia->delete();
                DB::commit();
            });
        } catch (Exception) {
            DB::rollback();
            return redirect()
                ->route( 'admin.noticias')
                ->with('message.error', 'No pudo eliminarse la noticia por un error en la base de datos.')
                ->withInput();
        }
        return redirect()
            ->route( 'admin.noticias')
            ->with('message.success', 'La noticia <b> "'.e($noticia['titulo']).'" </b> se eliminó con exito ');
    }

    /**
     * Lleva a la vista del formulario para editar la noticia.
     * @param int $id
     * @return Application|Factory|View
     */
    public function editarForm (int $id): View|Factory|Application
    {
        $categorias = Categoria::all();
        $noticia = Noticia::findOrFail($id);
        return view('noticias/form_editar', [
            'categorias' => $categorias,
            'noticia' => $noticia
        ]);

    }

    /**
     * Graba el formulario de editar noticia
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function editarFormGrabar (Request $request, int $id): RedirectResponse
    {
        $noticia = Noticia::findOrFail($id);
        $request->validate(Noticia::$rules, Noticia::$rulesMessage);
        $data = $request->all();
        $data['imagen'] = $this->cargarImagen($request) ?? $noticia->imagen;

        try {
            DB::transaction(function() use ($noticia, $data) {
                $noticia->update($data);
                $categorias = $data['categoria_id'] ?? [];
                $noticia->categorias()->sync($categorias);
                DB::commit();
            });
        } catch (Exception) {
            DB::rollback();
            return redirect()
                ->route( 'admin.noticias')
                ->with('message.error', 'No pudo editarse la noticia por un error en la base de datos.')
                ->withInput();
        }
        return redirect()
            ->route( 'admin.noticias')
            ->with('message.success', 'La noticia <b> "'.e($noticia['titulo']).'" </b> se editó con exito ');
    }

    /**
     * Guardar la imagen subida, si tiene éxito retorna el nombre del archivo, sino null.
     * @param Request $request
     * @param string $field
     * @return string|null
     */
    protected function cargarImagen(Request $request, string $field = 'imagen'): ?string
    {
        if($request->hasFile($field) && $request->file($field)->isValid()){
            $filename = date('YmdHis') . "." . $request->file($field)->extension();
            Image::make($request->file($field))
                ->resize(300,300, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
            ->save(public_path('img/' . $filename));
            return $filename;
        }
        return null;
    }
}
