<?php

namespace App\Repositories;

use App\Models\Ececitems;
use App\Repositories\BaseRepository;

/**
 * Class EcecitemsRepository
 * @package App\Repositories
 * @version August 19, 2022, 5:42 am UTC
*/

class EcecitemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'energyclassifications_id',
        'ecitems_id',
        'heatingtypes_id',
        'quantity_id',
        'piece'
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
        return Ececitems::class;
    }
}
