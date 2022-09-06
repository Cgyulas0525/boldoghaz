<?php

namespace App\Repositories;

use App\Models\Additionalelements;
use App\Repositories\BaseRepository;

/**
 * Class AdditionalelementsRepository
 * @package App\Repositories
 * @version August 27, 2022, 4:51 am UTC
*/

class AdditionalelementsRepository extends BaseRepository
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
        return Additionalelements::class;
    }
}
