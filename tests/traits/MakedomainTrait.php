<?php

use Faker\Factory as Faker;
use App\Models\domain;
use App\Repositories\domainRepository;

trait MakedomainTrait
{
    /**
     * Create fake instance of domain and save it in database
     *
     * @param array $domainFields
     * @return domain
     */
    public function makedomain($domainFields = [])
    {
        /** @var domainRepository $domainRepo */
        $domainRepo = App::make(domainRepository::class);
        $theme = $this->fakedomainData($domainFields);
        return $domainRepo->create($theme);
    }

    /**
     * Get fake instance of domain
     *
     * @param array $domainFields
     * @return domain
     */
    public function fakedomain($domainFields = [])
    {
        return new domain($this->fakedomainData($domainFields));
    }

    /**
     * Get fake data of domain
     *
     * @param array $postFields
     * @return array
     */
    public function fakedomainData($domainFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomD' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $domainFields);
    }
}
