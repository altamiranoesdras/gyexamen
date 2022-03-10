<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Departamento;

class DepartamentoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_departamento()
    {
        $departamento = factory(Departamento::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/departamentos', $departamento
        );

        $this->assertApiResponse($departamento);
    }

    /**
     * @test
     */
    public function test_read_departamento()
    {
        $departamento = factory(Departamento::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/departamentos/'.$departamento->id
        );

        $this->assertApiResponse($departamento->toArray());
    }

    /**
     * @test
     */
    public function test_update_departamento()
    {
        $departamento = factory(Departamento::class)->create();
        $editedDepartamento = factory(Departamento::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/departamentos/'.$departamento->id,
            $editedDepartamento
        );

        $this->assertApiResponse($editedDepartamento);
    }

    /**
     * @test
     */
    public function test_delete_departamento()
    {
        $departamento = factory(Departamento::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/departamentos/'.$departamento->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/departamentos/'.$departamento->id
        );

        $this->response->assertStatus(404);
    }
}
