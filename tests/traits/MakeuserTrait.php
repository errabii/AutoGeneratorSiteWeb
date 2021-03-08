<?php

use Faker\Factory as Faker;
use App\Models\user;
use App\Repositories\userRepository;

trait MakeuserTrait
{
    /**
     * Create fake instance of user and save it in database
     *
     * @param array $userFields
     * @return user
     */
    public function makeuser($userFields = [])
    {
        /** @var userRepository $userRepo */
        $userRepo = App::make(userRepository::class);
        $theme = $this->fakeuserData($userFields);
        return $userRepo->create($theme);
    }

    /**
     * Get fake instance of user
     *
     * @param array $userFields
     * @return user
     */
    public function fakeuser($userFields = [])
    {
        return new user($this->fakeuserData($userFields));
    }

    /**
     * Get fake data of user
     *
     * @param array $postFields
     * @return array
     */
    public function fakeuserData($userFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nom' => $fake->word,
            'prenom' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $userFields);
    }
}
