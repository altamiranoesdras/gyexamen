<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Municipio;

class MunicipioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_municipio()
    {
        $municipio = factory(Municipio::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/municipios', $municipio
        );

        $this->assertApiResponse($municipio);
    }

    /**
     * @test
     */
    public function test_read_municipio()
    {
        $municipio = factory(Municipio::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/municipios/'.$municipio->id
        );

        $this->assertApiResponse($municipio->toArray());
    }

    /**
     * @test
     */
    public function test_update_municipio()
    {
        $municipio = factory(Municipio::class)->create();
        $editedMunicipio = factory(Municipio::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/municipios/'.$municipio->id,
            $editedMunicipio
        );

        $this->assertApiResponse($editedMunicipio);
    }

    /**
     * @test
     */
    public function test_delete_municipio()
    {
        $municipio = factory(Municipio::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/municipios/'.$municipio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/municipios/'.$municipio->id
        );

        $this->response->assertStatus(404);
    }
}
