<?php

namespace App\Repositories;

use App\Models\Contractcontenttypes;
use App\Repositories\BaseRepository;

/**
 * Class ContractcontenttypesRepository
 * @package App\Repositories
 * @version October 5, 2022, 9:42 am UTC
*/

class ContractcontenttypesRepository extends BaseRepository
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
        return Contractcontenttypes::class;
    }
}
