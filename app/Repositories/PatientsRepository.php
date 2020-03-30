<?php

namespace App\Repositories;

use App\Models\Patients;
use App\Repositories\BaseRepository;

/**
 * Class PatientsRepository
 * @package App\Repositories
 * @version March 28, 2020, 7:05 pm UTC
*/

class PatientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'address',
        'city',
        'state',
        'cep',
        'phone'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Patients::class;
    }
}
