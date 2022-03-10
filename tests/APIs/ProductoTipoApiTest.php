<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProductoTipo;

class ProductoTipoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_producto_tipo()
    {
        $productoTipo = factory(ProductoTipo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/producto_tipos', $productoTipo
        );

        $this->assertApiResponse($productoTipo);
    }

    /**
     * @test
     */
    public function test_read_producto_tipo()
    {
        $productoTipo = factory(ProductoTipo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/producto_tipos/'.$productoTipo->id
        );

        $this->assertApiResponse($productoTipo->toArray());
    }

    /**
     * @test
     */
    public function test_update_producto_tipo()
    {
        $productoTipo = factory(ProductoTipo::class)->create();
        $editedProductoTipo = factory(ProductoTipo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/producto_tipos/'.$productoTipo->id,
            $editedProductoTipo
        );

        $this->assertApiResponse($editedProductoTipo);
    }

    /**
     * @test
     */
    public function test_delete_producto_tipo()
    {
        $productoTipo = factory(ProductoTipo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/producto_tipos/'.$productoTipo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/producto_tipos/'.$productoTipo->id
        );

        $this->response->assertStatus(404);
    }
}
