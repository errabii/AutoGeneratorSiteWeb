<?php

use Faker\Factory as Faker;
use App\Models\client;
use App\Repositories\clientRepository;

trait MakeclientTrait
{
    /**
     * Create fake instance of client and save it in database
     *
     * @param array $clientFields
     * @return client
     */
    public function makeclient($clientFields = [])
    {
        /** @var clientRepository $clientRepo */
        $clientRepo = App::make(clientRepository::class);
        $theme = $this->fakeclientData($clientFields);
        return $clientRepo->create($theme);
    }

    /**
     * Get fake instance of client
     *
     * @param array $clientFields
     * @return client
     */
    public function fakeclient($clientFields = [])
    {
        return new client($this->fakeclientData($clientFields));
    }

    /**
     * Get fake data of client
     *
     * @param array $postFields
     * @return array
     */
    public function fakeclientData($clientFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nom' => $fake->word,
            'prenom' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'adresse' => $fake->word,
            'telephone' => $fake->word,
            'M/F' => $fake->word,
            'date_naissance' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $clientFields);
    }
}
