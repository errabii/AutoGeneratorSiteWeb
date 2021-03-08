<?php

use Faker\Factory as Faker;
use App\Models\config;
use App\Repositories\configRepository;

trait MakeconfigTrait
{
    /**
     * Create fake instance of config and save it in database
     *
     * @param array $configFields
     * @return config
     */
    public function makeconfig($configFields = [])
    {
        /** @var configRepository $configRepo */
        $configRepo = App::make(configRepository::class);
        $theme = $this->fakeconfigData($configFields);
        return $configRepo->create($theme);
    }

    /**
     * Get fake instance of config
     *
     * @param array $configFields
     * @return config
     */
    public function fakeconfig($configFields = [])
    {
        return new config($this->fakeconfigData($configFields));
    }

    /**
     * Get fake data of config
     *
     * @param array $postFields
     * @return array
     */
    public function fakeconfigData($configFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'protocole' => $fake->word,
            'domaine' => $fake->randomDigitNotNull,
            'nom_site' => $fake->word,
            'description_site' => $fake->word,
            'nom_admin' => $fake->word,
            'password' => $fake->word,
            'email' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $configFields);
    }
}
