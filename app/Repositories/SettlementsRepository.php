<?php

namespace App\Repositories;

use App\Models\Settlements;
use App\Repositories\BaseRepository;

/**
 * Class SettlementsRepository
 * @package App\Repositories
 * @version September 3, 2022, 6:16 am UTC
*/

class SettlementsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'settlement',
        'postalcode',
        'county',
        'area'
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
        return Settlements::class;
    }
}
