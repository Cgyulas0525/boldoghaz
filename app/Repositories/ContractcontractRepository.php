<?php

namespace App\Repositories;

use App\Models\Contractcontract;
use App\Repositories\BaseRepository;

/**
 * Class ContractcontractRepository
 * @package App\Repositories
 * @version December 20, 2022, 10:07 am UTC
*/

class ContractcontractRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'contract_id',
        'partnercontract_id',
        'constructionphase_id',
        'document_name',
        'document_urt',
        'deadline',
        'settlementdate',
        'amount',
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
        return Contractcontract::class;
    }
}
