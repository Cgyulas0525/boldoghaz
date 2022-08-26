<?php

namespace App\Repositories;

use App\Models\Eqeqitems;
use App\Repositories\BaseRepository;

/**
 * Class EqeqitemsRepository
 * @package App\Repositories
 * @version August 26, 2022, 12:14 pm UTC
*/

class EqeqitemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'equipmenttypes_id',
        'eqitems_id',
        'valuelimit',
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
        return Eqeqitems::class;
    }
}
