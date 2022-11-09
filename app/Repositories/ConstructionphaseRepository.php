<?php

namespace App\Repositories;

use App\Models\Constructionphase;
use App\Repositories\BaseRepository;

/**
 * Class ConstructionphaseRepository
 * @package App\Repositories
 * @version October 17, 2022, 9:44 am UTC
*/

class ConstructionphaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent_id',
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
        return Constructionphase::class;
    }
}
