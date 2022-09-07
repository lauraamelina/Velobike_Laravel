<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;

class ProductosController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index (Request $request): Factory|View|Application
    {
        $productosQuery = Productos::query();
        $busqueda = $request->has('busqueda') ? $request->query('busqueda') : null;
        if($busqueda) {
            $productosQuery->where('nombre', 'like', '%' . $busqueda . '%');
        }
        $productos = $productosQuery->paginate(3)->withQueryString();
        return view('productos/index',[
            'productos'=> $productos,
            'busqueda' => $busqueda
        ]);
    }

    /**
     * @param $id
     * @return Factory|View|Application
     */
    public function ver($id): Factory|View|Application
    {
        $producto = Productos::findOrFail($id);
        return view('productos.ver', [
            'producto' => $producto,

        ]);
    }

    /**
     * @return Factory|View|Application
     */
    public function agregarForm (): Factory|View|Application
    {
        return view('productos/form_nuevo');
    }

    /**
     * Graba los datos del formulario del alta del producto.
     * @param Request $request
     * @return RedirectResponse
     */
    public function grabarForm (Request $request): RedirectResponse
    {
        $request->validate(Productos::$rules, Productos::$rulesMessage);
        $data = $request->all();
        $data['imagen'] = $this->cargarImagen($request);

        DB::beginTransaction();
        try {
            $productos = Productos::create($data);
            DB::commit();
        } catch (Exception) {
            DB::rollback();
            return redirect()
                ->route( 'productos.agregar')
                ->with('message.error', 'No pudo eliminarse la productos por un error en la base de datos.')
                ->withInput();
        }
        return redirect()
            ->route( 'admin.productos')
            ->with('message.success', 'El productos <b> "'.e($data['nombre']).'" </b> se agregó con éxito ');

    }

    /**
     * Elimina la noticia
     * @param int $id
     * @return RedirectResponse
     */
    public function eliminar (int $id): RedirectResponse
    {
        $productos = Productos::findOrFail($id);
        try {
            DB::transaction(function() use ($productos) {
                $productos->delete();
                DB::commit();
            });
        } catch (Exception) {
            DB::rollback();
            return redirect()
                ->route( 'admin.productos')
                ->with('message.error', 'No pudo eliminarse la productos por un error en la base de datos.')
                ->withInput();
        }
        return redirect()
            ->route( 'admin.productos')
            ->with('message.success', 'El producto <b> "'.e($productos['nombre']).'" </b> se eliminó con exito ');
    }

    /**
     * Lleva a la vista del formulario para editar la noticia.
     * @param int $id
     * @return Application|Factory|View
     */
    public function editarForm (int $id): View|Factory|Application
    {
        $producto = Productos::findOrFail($id);
        return view('productos/form_editar', [
            'producto' => $producto
        ]);
    }

    /**
     * Graba el formulario de editar producto
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function editarFormGrabar (Request $request, int $id): RedirectResponse
    {
        $productos = Productos::findOrFail($id);
        $request->validate(Productos::$rules, Productos::$rulesMessage);
        $data = $request->all();
        $data['imagen'] = $this->cargarImagen($request) ?? $productos->imagen;

        try {
            DB::transaction(function() use ($productos, $data) {
                $productos->update($data);
                DB::commit();
            });
        } catch (Exception) {
            DB::rollback();
            return redirect()
                ->route( 'productos.editar')
                ->with('message.error', 'No pudo eliminarse el producto por un error en la base de datos.')
                ->withInput();
        }
        return redirect()
            ->route( 'admin.productos')
            ->with('message.success', 'El producto <b> "'.e($productos['nombre']).'" </b> se editó con exito ');
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
