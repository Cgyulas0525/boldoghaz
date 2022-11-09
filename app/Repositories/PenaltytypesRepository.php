<?php

namespace App\Repositories;

use App\Models\Penaltytypes;
use App\Repositories\BaseRepository;

/**
 * Class PenaltytypesRepository
 * @package App\Repositories
 * @version October 11, 2022, 9:21 am UTC
*/

class PenaltytypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'businessrate',
        'daypenalty',
        'daypenaltymax',
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
        return Penaltytypes::class;
    }
}
