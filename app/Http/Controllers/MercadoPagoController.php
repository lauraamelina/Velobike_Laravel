<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Compras;
use App\Models\Productos;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class MercadoPagoController extends Controller
{
    /**
     * Método que crea los Items de mercado pago y lleva a la vista correspondiente según el resultado del pago.
     * @return Factory|View|Application
     * @throws Exception
     */
    public function show(): Factory|View|Application
    {
        SDK::setAccessToken(config('mercadopago.access_token'));
        $preference = new Preference();

        $usuario = auth()->user()->id;
        $carrito = Carrito::where('user_id', $usuario)
            ->leftJoin('productos', 'carrito.productos_id', '=', 'productos.productos_id')
            ->get();

        $productos = [];
        $total = 0;
        foreach ($carrito as $item) {
           $productos[] = Productos::whereIn('productos_id', [$item->productos_id])->get();
           $total += $item->precio;
        }

        $preference->items = $this->createItem($productos);
        $preference->back_urls = [
            'success' => route('mp.success'),
            'pending' => route('mp.pending'),
            'failure' => route('mp.failure'),
        ];

        $preference->save();

        return view('mp.checkout', [
            'preference' => $preference,
            'total' => $total,
            'productos' => $productos,
            'mpPublicKey' => config('mercadopago.public_key')
        ]);
    }

    /**
     * Método que crea los items de mercado pago.
     * Recibe un array de productos y retorna todos los items.
     * @return array
     */
    public function createItem($productos) :array  {
        $items = [];

        foreach($productos as $producto) {
            $item = new Item();
            $item->id = $producto[0]->productos_id;
            $item->title = $producto[0]->nombre;
            $item->quantity = 1;
            $item->unit_price = $producto[0]->precio;

            $items[] = $item;
        }
        return $items;
    }


    /**
     * Método que, en caso de que la compra se haya pagado correctamente, crea la Compra::class y elimina el
     * carrito del usuario autenticado
     * @param Request $request
     * @return View|Factory|Application
     */
    public function processSuccess(Request $request): View|Factory|Application
    {
        $data = [
            'user_id' => '',
            'precio' => '',
            'productos_id' => '',
        ];
        $usuario = auth()->user()->id;
        $carrito = Carrito::where('user_id', $usuario)
            ->leftJoin('productos', 'carrito.productos_id', '=', 'productos.productos_id')
            ->get();

        foreach ($carrito as $producto){
            $data['user_id'] = $usuario;
            $data['productos_id'] = $producto->productos_id;
            $data['precio'] = $producto->precio;
            Compras::create($data);
        }

        Carrito::where('user_id', $usuario)->delete();

        return view('carrito.exito');
    }


    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function processPending(Request $request): View|Factory|Application
    {
        return view('mp.pending');
    }


    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function processFailure(Request $request): View|Factory|Application
    {
        return view('mp.failure');
    }


}
