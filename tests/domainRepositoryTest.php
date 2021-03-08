<?php

use App\Models\domain;
use App\Repositories\domainRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class domainRepositoryTest extends TestCase
{
    use MakedomainTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var domainRepository
     */
    protected $domainRepo;

    public function setUp()
    {
        parent::setUp();
        $this->domainRepo = App::make(domainRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedomain()
    {
        $domain = $this->fakedomainData();
        $createddomain = $this->domainRepo->create($domain);
        $createddomain = $createddomain->toArray();
        $this->assertArrayHasKey('id', $createddomain);
        $this->assertNotNull($createddomain['id'], 'Created domain must have id specified');
        $this->assertNotNull(domain::find($createddomain['id']), 'domain with given id must be in DB');
        $this->assertModelData($domain, $createddomain);
    }

    /**
     * @test read
     */
    public function testReaddomain()
    {
        $domain = $this->makedomain();
        $dbdomain = $this->domainRepo->find($domain->id);
        $dbdomain = $dbdomain->toArray();
        $this->assertModelData($domain->toArray(), $dbdomain);
    }

    /**
     * @test update
     */
    public function testUpdatedomain()
    {
        $domain = $this->makedomain();
        $fakedomain = $this->fakedomainData();
        $updateddomain = $this->domainRepo->update($fakedomain, $domain->id);
        $this->assertModelData($fakedomain, $updateddomain->toArray());
        $dbdomain = $this->domainRepo->find($domain->id);
        $this->assertModelData($fakedomain, $dbdomain->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedomain()
    {
        $domain = $this->makedomain();
        $resp = $this->domainRepo->delete($domain->id);
        $this->assertTrue($resp);
        $this->assertNull(domain::find($domain->id), 'domain should not exist in DB');
    }
}
