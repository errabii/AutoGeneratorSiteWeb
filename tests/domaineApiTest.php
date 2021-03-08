<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class domaineApiTest extends TestCase
{
    use MakedomaineTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedomaine()
    {
        $domaine = $this->fakedomaineData();
        $this->json('POST', '/api/v1/domaines', $domaine);

        $this->assertApiResponse($domaine);
    }

    /**
     * @test
     */
    public function testReaddomaine()
    {
        $domaine = $this->makedomaine();
        $this->json('GET', '/api/v1/domaines/'.$domaine->id);

        $this->assertApiResponse($domaine->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedomaine()
    {
        $domaine = $this->makedomaine();
        $editeddomaine = $this->fakedomaineData();

        $this->json('PUT', '/api/v1/domaines/'.$domaine->id, $editeddomaine);

        $this->assertApiResponse($editeddomaine);
    }

    /**
     * @test
     */
    public function testDeletedomaine()
    {
        $domaine = $this->makedomaine();
        $this->json('DELETE', '/api/v1/domaines/'.$domaine->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/domaines/'.$domaine->id);

        $this->assertResponseStatus(404);
    }
}
