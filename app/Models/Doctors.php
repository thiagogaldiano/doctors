<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Doctors
 * @package App\Models
 * @version March 28, 2020, 3:58 pm UTC
 *
 * @property string name
 * @property string email
 * @property string address
 * @property string city
 * @property string state
 * @property string cep
 * @property string long
 * @property string lat
 * @property integer specialty_id
 * @property integer user_id
 */
class Doctors extends Model
{

    public $table = 'doctors';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'name',
        'email',
        'address',
        'city',
        'state',
        'cep',
        'long',
        'lat',
        'specialty_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'cep' => 'string',
        'long' => 'string',
        'lat' => 'string',
        'specialty_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'cep' => 'required||max:8',
        'specialty_id' => 'required'
    ];

    public function specialty()
    {
        return $this->hasOne('App\Models\Specialties', 'id', 'specialty_id');
    }


}
