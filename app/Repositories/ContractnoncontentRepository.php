<?php

namespace App\Repositories;

use App\Models\Contractnoncontent;
use App\Repositories\BaseRepository;

/**
 * Class ContractnoncontentRepository
 * @package App\Repositories
 * @version November 7, 2022, 2:05 pm UTC
*/

class ContractnoncontentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contract_id',
        'contractnoncontenttypes_id',
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
        return Contractnoncontent::class;
    }
}
