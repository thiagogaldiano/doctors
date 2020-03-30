<?php

namespace App\Repositories;

use App\Models\Schedules;
use App\Repositories\BaseRepository;

/**
 * Class SchedulesRepository
 * @package App\Repositories
 * @version March 28, 2020, 4:16 pm UTC
*/

class SchedulesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'consultation_date',
        'patients_id',
        'doctors_id',
        'descriptions'
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
        return Schedules::class;
    }
}
