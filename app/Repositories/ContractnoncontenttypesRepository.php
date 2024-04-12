<?php

namespace App\Repositories;

use App\Models\Contractnoncontenttypes;

/**
 * Class ContractnoncontenttypesRepository
 * @package App\Repositories
 * @version October 5, 2022, 9:42 am UTC
*/

class ContractnoncontenttypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'types',
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
        return Contractnoncontenttypes::class;
    }
}
