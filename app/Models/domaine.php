<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class domaine
 * @package App\Models
 * @version June 30, 2020, 11:39 am UTC
 *
 * @property string nomD
 */
class domaine extends Model
{
    use SoftDeletes;

    public $table = 'domaines';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomD'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomD' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomD' => 'required'
    ];

    
}
