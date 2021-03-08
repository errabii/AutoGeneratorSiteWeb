<?php

use Faker\Factory as Faker;
use App\Models\domaine;
use App\Repositories\domaineRepository;

trait MakedomaineTrait
{
    /**
     * Create fake instance of domaine and save it in database
     *
     * @param array $domaineFields
     * @return domaine
     */
    public function makedomaine($domaineFields = [])
    {
        /** @var domaineRepository $domaineRepo */
        $domaineRepo = App::make(domaineRepository::class);
        $theme = $this->fakedomaineData($domaineFields);
        return $domaineRepo->create($theme);
    }

    /**
     * Get fake instance of domaine
     *
     * @param array $domaineFields
     * @return domaine
     */
    public function fakedomaine($domaineFields = [])
    {
        return new domaine($this->fakedomaineData($domaineFields));
    }

    /**
     * Get fake data of domaine
     *
     * @param array $postFields
     * @return array
     */
    public function fakedomaineData($domaineFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomD' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $domaineFields);
    }
}
