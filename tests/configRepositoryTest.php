<?php

use App\Models\config;
use App\Repositories\configRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class configRepositoryTest extends TestCase
{
    use MakeconfigTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var configRepository
     */
    protected $configRepo;

    public function setUp()
    {
        parent::setUp();
        $this->configRepo = App::make(configRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateconfig()
    {
        $config = $this->fakeconfigData();
        $createdconfig = $this->configRepo->create($config);
        $createdconfig = $createdconfig->toArray();
        $this->assertArrayHasKey('id', $createdconfig);
        $this->assertNotNull($createdconfig['id'], 'Created config must have id specified');
        $this->assertNotNull(config::find($createdconfig['id']), 'config with given id must be in DB');
        $this->assertModelData($config, $createdconfig);
    }

    /**
     * @test read
     */
    public function testReadconfig()
    {
        $config = $this->makeconfig();
        $dbconfig = $this->configRepo->find($config->id);
        $dbconfig = $dbconfig->toArray();
        $this->assertModelData($config->toArray(), $dbconfig);
    }

    /**
     * @test update
     */
    public function testUpdateconfig()
    {
        $config = $this->makeconfig();
        $fakeconfig = $this->fakeconfigData();
        $updatedconfig = $this->configRepo->update($fakeconfig, $config->id);
        $this->assertModelData($fakeconfig, $updatedconfig->toArray());
        $dbconfig = $this->configRepo->find($config->id);
        $this->assertModelData($fakeconfig, $dbconfig->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteconfig()
    {
        $config = $this->makeconfig();
        $resp = $this->configRepo->delete($config->id);
        $this->assertTrue($resp);
        $this->assertNull(config::find($config->id), 'config should not exist in DB');
    }
}
