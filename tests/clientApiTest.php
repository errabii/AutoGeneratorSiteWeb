<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class clientApiTest extends TestCase
{
    use MakeclientTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateclient()
    {
        $client = $this->fakeclientData();
        $this->json('POST', '/api/v1/clients', $client);

        $this->assertApiResponse($client);
    }

    /**
     * @test
     */
    public function testReadclient()
    {
        $client = $this->makeclient();
        $this->json('GET', '/api/v1/clients/'.$client->id);

        $this->assertApiResponse($client->toArray());
    }

    /**
     * @test
     */
    public function testUpdateclient()
    {
        $client = $this->makeclient();
        $editedclient = $this->fakeclientData();

        $this->json('PUT', '/api/v1/clients/'.$client->id, $editedclient);

        $this->assertApiResponse($editedclient);
    }

    /**
     * @test
     */
    public function testDeleteclient()
    {
        $client = $this->makeclient();
        $this->json('DELETE', '/api/v1/clients/'.$client->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/clients/'.$client->id);

        $this->assertResponseStatus(404);
    }
}
