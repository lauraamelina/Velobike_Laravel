<?php
namespace App\Http\Controllers;
use App\Models\Compras;
use App\Models\Productos;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ComprasController extends Controller
{

    /**
     * Le muestra al usuario todas sus compras realizadas.
     * @return Factory|View|Application
     */
    public function verCompras(): View|Factory|Application
    {
        $usuario = auth()->user()->id;
        $compras = Compras::where('user_id', $usuario)
            ->get();

        $productos = [];
        foreach ($compras as $compra) {
            $productos[] = Productos::findOrFail($compra['productos_id']);
        }

        return view('carrito.compras', [
            'compras' => $compras,
            'productos' => $productos
        ]);

    }
}
