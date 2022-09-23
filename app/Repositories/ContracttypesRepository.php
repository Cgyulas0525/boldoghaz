<?php

namespace App\Repositories;

use App\Models\Contracttypes;
use App\Repositories\BaseRepository;

/**
 * Class ContracttypesRepository
 * @package App\Repositories
 * @version September 21, 2022, 12:25 pm UTC
*/

class ContracttypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'commit'
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
        return Contracttypes::class;
    }
}
