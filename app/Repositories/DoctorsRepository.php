<?php

namespace App\Repositories;

use App\Models\Doctors;
use App\Repositories\BaseRepository;

/**
 * Class DoctorsRepository
 * @package App\Repositories
 * @version March 28, 2020, 3:58 pm UTC
*/

class DoctorsRepository extends BaseRepository
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
        'long',
        'lat',
        'specialty_id',
        'user_id'
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
        return Doctors::class;
    }
}
