<?php

use App\Models\domaine;
use App\Repositories\domaineRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class domaineRepositoryTest extends TestCase
{
    use MakedomaineTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var domaineRepository
     */
    protected $domaineRepo;

    public function setUp()
    {
        parent::setUp();
        $this->domaineRepo = App::make(domaineRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedomaine()
    {
        $domaine = $this->fakedomaineData();
        $createddomaine = $this->domaineRepo->create($domaine);
        $createddomaine = $createddomaine->toArray();
        $this->assertArrayHasKey('id', $createddomaine);
        $this->assertNotNull($createddomaine['id'], 'Created domaine must have id specified');
        $this->assertNotNull(domaine::find($createddomaine['id']), 'domaine with given id must be in DB');
        $this->assertModelData($domaine, $createddomaine);
    }

    /**
     * @test read
     */
    public function testReaddomaine()
    {
        $domaine = $this->makedomaine();
        $dbdomaine = $this->domaineRepo->find($domaine->id);
        $dbdomaine = $dbdomaine->toArray();
        $this->assertModelData($domaine->toArray(), $dbdomaine);
    }

    /**
     * @test update
     */
    public function testUpdatedomaine()
    {
        $domaine = $this->makedomaine();
        $fakedomaine = $this->fakedomaineData();
        $updateddomaine = $this->domaineRepo->update($fakedomaine, $domaine->id);
        $this->assertModelData($fakedomaine, $updateddomaine->toArray());
        $dbdomaine = $this->domaineRepo->find($domaine->id);
        $this->assertModelData($fakedomaine, $dbdomaine->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedomaine()
    {
        $domaine = $this->makedomaine();
        $resp = $this->domaineRepo->delete($domaine->id);
        $this->assertTrue($resp);
        $this->assertNull(domaine::find($domaine->id), 'domaine should not exist in DB');
    }
}
