<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class domainApiTest extends TestCase
{
    use MakedomainTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedomain()
    {
        $domain = $this->fakedomainData();
        $this->json('POST', '/api/v1/domains', $domain);

        $this->assertApiResponse($domain);
    }

    /**
     * @test
     */
    public function testReaddomain()
    {
        $domain = $this->makedomain();
        $this->json('GET', '/api/v1/domains/'.$domain->id);

        $this->assertApiResponse($domain->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedomain()
    {
        $domain = $this->makedomain();
        $editeddomain = $this->fakedomainData();

        $this->json('PUT', '/api/v1/domains/'.$domain->id, $editeddomain);

        $this->assertApiResponse($editeddomain);
    }

    /**
     * @test
     */
    public function testDeletedomain()
    {
        $domain = $this->makedomain();
        $this->json('DELETE', '/api/v1/domains/'.$domain->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/domains/'.$domain->id);

        $this->assertResponseStatus(404);
    }
}
