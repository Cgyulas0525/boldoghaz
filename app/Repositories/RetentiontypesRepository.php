<?php

namespace App\Repositories;

use App\Models\Retentiontypes;
use App\Repositories\BaseRepository;

/**
 * Class RetentiontypesRepository
 * @package App\Repositories
 * @version September 23, 2022, 9:01 am UTC
*/

class RetentiontypesRepository extends BaseRepository
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
        return Retentiontypes::class;
    }
}
