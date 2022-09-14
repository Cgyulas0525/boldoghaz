<?php

namespace App\Repositories;

use App\Models\Financialinstitutions;
use App\Repositories\BaseRepository;

/**
 * Class FinancialinstitutionsRepository
 * @package App\Repositories
 * @version September 13, 2022, 12:31 pm UTC
*/

class FinancialinstitutionsRepository extends BaseRepository
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
        return Financialinstitutions::class;
    }
}
