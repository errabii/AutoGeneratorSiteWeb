<?php

namespace App\Repositories;

use App\Models\client;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class clientRepository
 * @package App\Repositories
 * @version June 30, 2020, 12:38 pm UTC
 *
 * @method client findWithoutFail($id, $columns = ['*'])
 * @method client find($id, $columns = ['*'])
 * @method client first($columns = ['*'])
*/
class clientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'email',
        'password',
        'adresse',
        'telephone',
        'date_naissance'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return client::class;
    }
}
