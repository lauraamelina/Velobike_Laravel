<?php
namespace App\Http\Controllers\API;
use App\Models\Productos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Método que retorna un JSON con todos los productos.
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return response()->json([
            'data' => Productos::all(),
        ]);
    }

    /**
     * Método que recibe un ID y retorna en JSON el producto con ese ID.
     * @param int $id
     * @return JsonResponse
     */
    public function view(int $id): JsonResponse
    {
        return response()->json([
            'status' => 0,
            'data' => Productos::findOrFail($id),
        ]);
    }


    /**
     * Método que crea un producto, recibe las propiedades del productos y retorna un JSON.
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $request->validate(Productos::$rules, Productos::$rulesMessage);
        $data = $request->input();
        Productos::create($data);
        return response()->json([
            'status' => 0
        ]);
    }

    /**
     * Método que edita un producto, recibe el ID del producto y las propiedades nuevas.
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $request->validate(Productos::$rules, Productos::$rulesMessage);
        $data = $request->input();
        $producto = Productos::findOrFail($id);
        $producto->update($data);

        return response()->json([
            'status' => 0
        ]);
    }

    /**
     * Método que elimina un producto según el ID recibido por parámetro.
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $producto = Productos::findOrFail($id);

        DB::transaction(function() use ($producto) {
            $producto->delete();
        });

        return response()->json([
            'status' => 0,
        ]);
    }


}
