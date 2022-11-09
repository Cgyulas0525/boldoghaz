<?php

namespace App\Repositories;

use App\Models\Ecitems;
use App\Repositories\BaseRepository;

/**
 * Class EcitemsRepository
 * @package App\Repositories
 * @version November 5, 2022, 7:54 am UTC
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
