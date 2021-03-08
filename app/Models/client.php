<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class client
 * @package App\Models
 * @version June 30, 2020, 12:38 pm UTC
 *
 * @property string nom
 * @property string prenom
 * @property string email
 * @property string password
 * @property string adresse
 * @property string telephone
 * @property date date_naissance
 */
class client extends Model
{
    use SoftDeletes;

    public $table = 'clients';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'adresse',
        'telephone',
        'date_naissance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'prenom' => 'string',
        'email' => 'string',
        'password' => 'string',
        'adresse' => 'string',
        'telephone' => 'string',
        'date_naissance' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'email',
        'password' => 'required',
        'adresse' => 'required',
        'telephone' => 'required'
    ];

    
}
