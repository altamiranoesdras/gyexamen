<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ClienteProcuto;

class ClienteProcutoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cliente_procuto()
    {
        $clienteProcuto = factory(ClienteProcuto::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cliente_procutos', $clienteProcuto
        );

        $this->assertApiResponse($clienteProcuto);
    }

    /**
     * @test
     */
    public function test_read_cliente_procuto()
    {
        $clienteProcuto = factory(ClienteProcuto::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/cliente_procutos/'.$clienteProcuto->id
        );

        $this->assertApiResponse($clienteProcuto->toArray());
    }

    /**
     * @test
     */
    public function test_update_cliente_procuto()
    {
        $clienteProcuto = factory(ClienteProcuto::class)->create();
        $editedClienteProcuto = factory(ClienteProcuto::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cliente_procutos/'.$clienteProcuto->id,
            $editedClienteProcuto
        );

        $this->assertApiResponse($editedClienteProcuto);
    }

    /**
     * @test
     */
    public function test_delete_cliente_procuto()
    {
        $clienteProcuto = factory(ClienteProcuto::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cliente_procutos/'.$clienteProcuto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cliente_procutos/'.$clienteProcuto->id
        );

        $this->response->assertStatus(404);
    }
}
