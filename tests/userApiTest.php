<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class userApiTest extends TestCase
{
    use MakeuserTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateuser()
    {
        $user = $this->fakeuserData();
        $this->json('POST', '/api/v1/users', $user);

        $this->assertApiResponse($user);
    }

    /**
     * @test
     */
    public function testReaduser()
    {
        $user = $this->makeuser();
        $this->json('GET', '/api/v1/users/'.$user->id);

        $this->assertApiResponse($user->toArray());
    }

    /**
     * @test
     */
    public function testUpdateuser()
    {
        $user = $this->makeuser();
        $editeduser = $this->fakeuserData();

        $this->json('PUT', '/api/v1/users/'.$user->id, $editeduser);

        $this->assertApiResponse($editeduser);
    }

    /**
     * @test
     */
    public function testDeleteuser()
    {
        $user = $this->makeuser();
        $this->json('DELETE', '/api/v1/users/'.$user->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/users/'.$user->id);

        $this->assertResponseStatus(404);
    }
}
