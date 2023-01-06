<?php

namespace App\Repositories;

use App\Models\Contractpenalty;
use App\Repositories\BaseRepository;

/**
 * Class ContractpenaltyRepository
 * @package App\Repositories
 * @version December 19, 2022, 2:37 pm UTC
*/

class ContractpenaltyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contract_id',
        'partnercontract_id',
        'penaltytypes_id',
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
        return Contractpenalty::class;
    }
}
