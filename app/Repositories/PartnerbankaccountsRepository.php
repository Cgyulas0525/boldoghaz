<?php

namespace App\Repositories;

use App\Models\Partnerbankaccounts;
use App\Repositories\BaseRepository;

/**
 * Class PartnerbankaccountsRepository
 * @package App\Repositories
 * @version September 13, 2022, 12:45 pm UTC
*/

class PartnerbankaccountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'partners_id',
        'financialinstitutions_id',
        'accountnumber',
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
        return Partnerbankaccounts::class;
    }
}
