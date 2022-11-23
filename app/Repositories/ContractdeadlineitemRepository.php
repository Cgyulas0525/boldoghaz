<?php

namespace App\Repositories;

use App\Models\Contractdeadlineitem;
use App\Repositories\BaseRepository;

/**
 * Class ContractdeadlineitemRepository
 * @package App\Repositories
 * @version November 18, 2022, 8:48 am UTC
*/

class ContractdeadlineitemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contractdeadline_id',
        'deadline',
        'performance',
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
        return Contractdeadlineitem::class;
    }
}
