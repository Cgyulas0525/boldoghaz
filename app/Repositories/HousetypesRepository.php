<?php

namespace App\Repositories;

use App\Models\Housetypes;
use App\Repositories\BaseRepository;

/**
 * Class HousetypesRepository
 * @package App\Repositories
 * @version September 21, 2022, 12:26 pm UTC
*/

class HousetypesRepository extends BaseRepository
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
        return Housetypes::class;
    }
}
