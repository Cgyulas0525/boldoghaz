<?php

namespace App\Repositories;

use App\Models\Ecitems;
use App\Repositories\BaseRepository;

/**
 * Class EcitemsRepository
 * @package App\Repositories
 * @version August 18, 2022, 9:13 am UTC
*/

class EcitemsRepository extends BaseRepository
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
        return Ecitems::class;
    }
}
