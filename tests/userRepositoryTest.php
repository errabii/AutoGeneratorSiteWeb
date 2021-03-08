<?php

use App\Models\user;
use App\Repositories\userRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class userRepositoryTest extends TestCase
{
    use MakeuserTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var userRepository
     */
    protected $userRepo;

    public function setUp()
    {
        parent::setUp();
        $this->userRepo = App::make(userRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateuser()
    {
        $user = $this->fakeuserData();
        $createduser = $this->userRepo->create($user);
        $createduser = $createduser->toArray();
        $this->assertArrayHasKey('id', $createduser);
        $this->assertNotNull($createduser['id'], 'Created user must have id specified');
        $this->assertNotNull(user::find($createduser['id']), 'user with given id must be in DB');
        $this->assertModelData($user, $createduser);
    }

    /**
     * @test read
     */
    public function testReaduser()
    {
        $user = $this->makeuser();
        $dbuser = $this->userRepo->find($user->id);
        $dbuser = $dbuser->toArray();
        $this->assertModelData($user->toArray(), $dbuser);
    }

    /**
     * @test update
     */
    public function testUpdateuser()
    {
        $user = $this->makeuser();
        $fakeuser = $this->fakeuserData();
        $updateduser = $this->userRepo->update($fakeuser, $user->id);
        $this->assertModelData($fakeuser, $updateduser->toArray());
        $dbuser = $this->userRepo->find($user->id);
        $this->assertModelData($fakeuser, $dbuser->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteuser()
    {
        $user = $this->makeuser();
        $resp = $this->userRepo->delete($user->id);
        $this->assertTrue($resp);
        $this->assertNull(user::find($user->id), 'user should not exist in DB');
    }
}
