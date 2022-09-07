<?php

namespace App\Http\Controllers;
use App\Models\Carrito;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Método que agrega un producto al carrito
     * @param Request $request
     * @return RedirectResponse
     */
    public function agregarCarrito(Request $request): RedirectResponse
    {
        $data = $request->all();
        $carrito = Carrito::where('user_id', auth()->user()->id);
        Carrito::create($data);
        return redirect()
            ->route('carrito')
            ->with('message.success', 'Se agregó el producto correctamente');
    }

    /**
     * Método para ver el carrito del usuario autenticado.
     * @return Factory|View|Application
     */
    public function verCarrito(): Factory|View|Application
    {
        $usuario = auth()->user()->id;
        $carrito = Carrito::where('user_id', $usuario)
            ->leftJoin('productos', 'carrito.productos_id', '=', 'productos.productos_id')
            ->get();

        $total = 0;
        foreach ($carrito as $item) {
            $total += $item->precio;
        }

        return view('carrito.index', [
            'carrito' => $carrito,
            'total'   => $total
        ]);
    }


    /**
     * Método que redirecciona a la pasarela de pago de Mercado Pago.
     */
    public function compra(): RedirectResponse
    {
        return redirect()
            ->route('mp.test');
    }


    /**
     * Método que borra un producto del carrito
     * @param int $id
     * @return RedirectResponse
     */
    public function deleteItem(int $id): RedirectResponse
    {
        $item = Carrito::findOrFail($id);
        $item->delete();

        return redirect()
            ->route('carrito')
            ->with('message.success', 'El ítem se ha eliminado del carrito correctamente');

    }


    /**
     * Método que vacía el carrito del usuario autenticado.
     * @return RedirectResponse
     */
    public function vaciarCarrito(): RedirectResponse
    {
        $id = auth()->user()->id;
        Carrito::where('user_id', $id)->delete();

        return redirect()
            ->route('carrito')
            ->with('message.success', 'Se ha vaciado el carrito correctamente');
    }


    /**
     * Método que retorna la vista de la compra se realizó con éxito.
     * @return Factory|View|Application
     */
    public function compraExito(): Factory|View|Application
    {
        return view('carrito.exito');
    }
}
