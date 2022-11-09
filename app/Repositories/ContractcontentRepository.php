<?php

namespace App\Repositories;

use App\Models\Contractcontent;
use App\Repositories\BaseRepository;

/**
 * Class ContractcontentRepository
 * @package App\Repositories
 * @version November 5, 2022, 8:06 am UTC
*/

class ContractcontentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contract_id',
        'contractcontenttypes_id',
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
        return Contractcontent::class;
    }
}
