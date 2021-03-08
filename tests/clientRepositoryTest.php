<?php

use App\Models\client;
use App\Repositories\clientRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class clientRepositoryTest extends TestCase
{
    use MakeclientTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var clientRepository
     */
    protected $clientRepo;

    public function setUp()
    {
        parent::setUp();
        $this->clientRepo = App::make(clientRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateclient()
    {
        $client = $this->fakeclientData();
        $createdclient = $this->clientRepo->create($client);
        $createdclient = $createdclient->toArray();
        $this->assertArrayHasKey('id', $createdclient);
        $this->assertNotNull($createdclient['id'], 'Created client must have id specified');
        $this->assertNotNull(client::find($createdclient['id']), 'client with given id must be in DB');
        $this->assertModelData($client, $createdclient);
    }

    /**
     * @test read
     */
    public function testReadclient()
    {
        $client = $this->makeclient();
        $dbclient = $this->clientRepo->find($client->id);
        $dbclient = $dbclient->toArray();
        $this->assertModelData($client->toArray(), $dbclient);
    }

    /**
     * @test update
     */
    public function testUpdateclient()
    {
        $client = $this->makeclient();
        $fakeclient = $this->fakeclientData();
        $updatedclient = $this->clientRepo->update($fakeclient, $client->id);
        $this->assertModelData($fakeclient, $updatedclient->toArray());
        $dbclient = $this->clientRepo->find($client->id);
        $this->assertModelData($fakeclient, $dbclient->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteclient()
    {
        $client = $this->makeclient();
        $resp = $this->clientRepo->delete($client->id);
        $this->assertTrue($resp);
        $this->assertNull(client::find($client->id), 'client should not exist in DB');
    }
}
