<?php

namespace App\Repositories;

use App\Models\config;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class configRepository
 * @package App\Repositories
 * @version June 30, 2020, 4:00 pm UTC
 *
 * @method config findWithoutFail($id, $columns = ['*'])
 * @method config find($id, $columns = ['*'])
 * @method config first($columns = ['*'])
*/
class configRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'protocole',
        'domaine_id',
        'nom_site',
        'description_site',
        'nom_admin',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return config::class;
    }
}
