<?php

namespace App\Repositories;

use App\Models\domaine;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class domaineRepository
 * @package App\Repositories
 * @version June 30, 2020, 11:39 am UTC
 *
 * @method domaine findWithoutFail($id, $columns = ['*'])
 * @method domaine find($id, $columns = ['*'])
 * @method domaine first($columns = ['*'])
*/
class domaineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomD'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return domaine::class;
    }
}
