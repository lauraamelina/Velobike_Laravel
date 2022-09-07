<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiProductosTest extends TestCase
{
    /**
     * Metodo que autentica al usuario del test como admin
     * @return ApiProductosTest
     */
    protected function withAuth(): ApiProductosTest
    {
        $user = new User();
        $user->id = 1;
        $user->email = 'admin@velobike.com';
        return $this->actingAs($user);
    }



    public function test_como_admin_puedo_tener_una_lista_de_todos_los_productos()
    {
        $response = $this
            ->withAuth()
            ->getJson('/api/productos');
        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 9, fn (AssertableJson $json) =>
            $json->hasAll(['productos_id', 'nombre', 'precio','freno', 'cambio', 'marca', 'descripcion', 'imagen'])
                ->etc()
            )
            );
    }

    public function test_como_admin_puedo_traer_un_producto_por_id()
    {
        $response = $this
            ->withAuth()
            ->getJson('/api/productos/1');

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('status', 0)
                ->has('data', fn (AssertableJson $json) =>
                $json->where('productos_id', 1)
                    ->where('nombre', 'Bicicleta Motomel')
                    ->etc()
                )
            );
    }

    public function test_como_admin_puedo_crear_un_producto() {
        $response = $this
            ->withAuth()
            ->postJson('/api/productos', [
                'nombre' => 'Bici turbo',
                'precio' => 300,
                'marca' => 'Motomel',
                'freno' => 'Disco hidráulico',
                'cambio' => 'Shimano Acera',
                'descripcion' => 'Una bici muy buena para andar por las montañas'
            ]);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('status', 0)
            );
    }

    public function test_como_admin_puedo_editar_un_producto()
    {
        $response = $this
            ->withAuth()
            ->putJson('/api/productos/1', [
                'nombre'=>"Bicicleta Motomel",
                'precio'=>10000,
                'marca'=>'Maxam',
                'cambio'=>'Shimano Acera',
                'freno'=> 'Disco hidráulico',
                'descripcion'=>'Las montañas, senderos o asfalto son su hábitat natural. La horquilla con bloqueo y regulación te hará disfrutar de cada piso y te dará la seguridad que necesitas para disfrutar sin preocuparte del suelo que transites',

            ]);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('status', 0)
            );

        $responseCheck = $this
            ->withAuth()
            ->getJson('/api/productos/1');

        $responseCheck
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json
                ->where('status', 0)
                ->has('data', fn (AssertableJson $json) =>
                $json->where('nombre', 'Bicicleta Motomel')
                    ->where('precio', 10000)
                    ->where('marca', 'Maxam')
                    ->where('cambio', 'Shimano Acera')
                    ->where('freno', 'Disco hidráulico')
                    ->where('descripcion', 'Las montañas, senderos o asfalto son su hábitat natural. La horquilla con bloqueo y regulación te hará disfrutar de cada piso y te dará la seguridad que necesitas para disfrutar sin preocuparte del suelo que transites')
                    ->etc()
                )
            );
    }

    public function test_como_admin_puedo_eliminar_un_producto()
    {
        $response = $this
            ->withAuth()
            ->deleteJson('/api/productos/8');

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('status', 0)
            );

        $responseCheck = $this
            ->withAuth()
            ->getJson('/api/productos/8');

        $responseCheck
            ->assertStatus(404);
    }

}
