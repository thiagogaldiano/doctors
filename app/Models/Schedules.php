<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Schedules
 * @package App\Models
 * @version March 28, 2020, 4:16 pm UTC
 *
 * @property string|\Carbon\Carbon consultation_date
 * @property integer patients_id
 * @property integer doctors_id
 * @property string descriptions
 */
class Schedules extends Model
{
    public $table = 'schedules';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'consultation_date',
        'patients_id',
        'doctors_id',
        'descriptions'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'consultation_date' => 'datetime',
        'patients_id' => 'integer',
        'doctors_id' => 'integer',
        'descriptions' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'consultation_date' => 'required',
        'patients_id' => 'required',
        'doctors_id' => 'required',
        'descriptions' => 'required'
    ];

    public function doctors()
    {
        return $this->hasOne('App\Models\Doctors','id','doctors_id');
    }

    public function patients()
    {
        return $this->hasOne('App\Models\Patients','id','patients_id');
    }


}
