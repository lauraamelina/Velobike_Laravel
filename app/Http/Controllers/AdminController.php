<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Noticia;
use App\Models\Productos;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Método que retorna la vista index del admin.
     * Retorna dos variables para renderizar el Charts (gráfico del dashboard)
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $record = Compras::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw
        ("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();

        $data = [];

        foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);

        $productos = DB::table('compras')
            ->leftJoin('productos', 'compras.productos_id', '=', 'productos.productos_id')
            ->get()
            ->groupBy('productos_id');


        $dataProductos = [];

        foreach($productos as $row) {
            $dataProductos['label'][] = $row[0]->nombre;
            $dataProductos['data'][] = $row->count();
        }

        $dataProductos['chart_data'] = json_encode($dataProductos);

        return view('admin/index', [
            'data' => $data,
            'dataProductos' => $dataProductos
        ]);
    }

    /**
     * Lleva a la vista de noticias dentro de Admin con la variable $noticias
     * @return Application|Factory|View
     */
     public function noticias(): View|Factory|Application
     {
         $noticias= Noticia::all();
         return view('admin/noticias',[
             'noticias'=> $noticias
         ]);
     }

    /**
     * Método que retorna la vista de una sola noticia según el ID recibido por parámetro.
     * @param $id
     * @return Factory|View|Application
     */
    public function verNoticias ($id): Factory|View|Application
    {
        $noticia = Noticia::findOrFail($id);
        return view('admin/ver_noticias', [
            'noticia' => $noticia,
        ]);
    }

    /**
     * Lleva a la vista de productos dentro de Admin con la variable $noticias
     * @return Application|Factory|View
     */
    public function productos(): View|Factory|Application
    {
        $productos = Productos::all();
        return view('admin/productos',[
            'productos'=> $productos
        ]);
    }

    /**
     * Método que retorna la vista de un solo producto según el ID recibido por parámetro.
     * @param $id
     * @return Factory|View|Application
     */
    public function verProductos ($id): Factory|View|Application
    {
        $producto = Productos::findOrFail($id);
        return view('admin/ver_productos', [
            'producto' => $producto,
        ]);
    }

    /**
     * Lleva a la vista de usuarios dentro de Admin con la variable $usuarios
     * @return Application|Factory|View
     */
    public function usuarios(): View|Factory|Application
    {
        $usuarios = User::all();
        return view('admin/usuarios',[
            'usuarios'=> $usuarios
        ]);
    }

    /**
     * Muestra al admin todas las compras y todos los datos de los usuarios.
     * @param $id
     * @return Factory|View|Application
     */
    public function verUsuario ($id): Factory|View|Application
    {
        $usuario = User::findOrFail($id);
        $compras = Compras::where('user_id', $usuario->id)
            ->get();
        $productos = [];
        foreach ($compras as $compra) {
            $productos[] = Productos::findOrFail($compra['productos_id']);
        }

        return view('admin/ver_usuarios', [
            'usuario' => $usuario,
            'compras' => $compras,
            'productos' => $productos
        ]);
    }

}
