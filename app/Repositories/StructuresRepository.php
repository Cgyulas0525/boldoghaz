<?php

namespace App\Repositories;

use App\Models\Structures;
use App\Repositories\BaseRepository;

/**
 * Class StructuresRepository
 * @package App\Repositories
 * @version August 26, 2022, 9:46 am UTC
*/

class StructuresRepository extends BaseRepository
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
        return Structures::class;
    }
}
