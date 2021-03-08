<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class config
 * @package App\Models
 * @version June 30, 2020, 4:00 pm UTC
 *
 * @property string protocole
 * @property integer domaine_id
 * @property string nom_site
 * @property string description_site
 * @property string nom_admin
 * @property string password
 * @property string email
 */
class config extends Model
{
    use SoftDeletes;

    public $table = 'configs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'protocole',
        'domaine_id',
        'nom_site',
        'description_site',
        'nom_admin',
        'password',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'protocole' => 'string',
        'domaine_id' => 'integer',
        'nom_site' => 'string',
        'description_site' => 'string',
        'nom_admin' => 'string',
        'password' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'protocole' => 'required',
        'nom_site' => 'required',
        'nom_admin' => 'required',
        'password' => 'required',
        'email' => 'email'
    ];

    
}
