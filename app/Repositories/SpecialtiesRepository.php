<?php

namespace App\Repositories;

use App\Models\Specialties;
use App\Repositories\BaseRepository;

/**
 * Class SpecialtiesRepository
 * @package App\Repositories
 * @version March 28, 2020, 4:22 pm UTC
*/

class SpecialtiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description'
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
        return Specialties::class;
    }
}
