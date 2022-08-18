<?php

namespace App\Repositories;

use App\Models\Heatingtypes;
use App\Repositories\BaseRepository;

/**
 * Class HeatingtypesRepository
 * @package App\Repositories
 * @version August 18, 2022, 9:56 am UTC
*/

class HeatingtypesRepository extends BaseRepository
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
        return Heatingtypes::class;
    }
}
