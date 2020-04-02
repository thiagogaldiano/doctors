<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Patients
 * @package App\Models
 * @version March 28, 2020, 7:05 pm UTC
 *
 * @property string name
 * @property string email
 * @property string address
 * @property string city
 * @property string state
 * @property string cep
 * @property string phone
 */
class Patients extends Model
{

    public $table = 'patients';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'email',
        'address',
        'city',
        'state',
        'cep',
        'phone'
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
        'phone' => 'string'
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
        'cep' => 'required|min:8|max:9',
        'phone' => 'required|min:11'
    ];


}
