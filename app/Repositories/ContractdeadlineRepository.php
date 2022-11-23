<?php

namespace App\Repositories;

use App\Models\Contractdeadline;
use App\Repositories\BaseRepository;

/**
 * Class ContractdeadlineRepository
 * @package App\Repositories
 * @version November 18, 2022, 8:47 am UTC
*/

class ContractdeadlineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contract_id',
        'constructionphase_id',
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
        return Contractdeadline::class;
    }
}
