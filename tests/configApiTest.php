<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class configApiTest extends TestCase
{
    use MakeconfigTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateconfig()
    {
        $config = $this->fakeconfigData();
        $this->json('POST', '/api/v1/configs', $config);

        $this->assertApiResponse($config);
    }

    /**
     * @test
     */
    public function testReadconfig()
    {
        $config = $this->makeconfig();
        $this->json('GET', '/api/v1/configs/'.$config->id);

        $this->assertApiResponse($config->toArray());
    }

    /**
     * @test
     */
    public function testUpdateconfig()
    {
        $config = $this->makeconfig();
        $editedconfig = $this->fakeconfigData();

        $this->json('PUT', '/api/v1/configs/'.$config->id, $editedconfig);

        $this->assertApiResponse($editedconfig);
    }

    /**
     * @test
     */
    public function testDeleteconfig()
    {
        $config = $this->makeconfig();
        $this->json('DELETE', '/api/v1/configs/'.$config->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/configs/'.$config->id);

        $this->assertResponseStatus(404);
    }
}
