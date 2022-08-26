<?php

namespace App\Repositories;

use App\Models\Eqitems;
use App\Repositories\BaseRepository;

/**
 * Class EqitemsRepository
 * @package App\Repositories
 * @version August 26, 2022, 11:54 am UTC
*/

class EqitemsRepository extends BaseRepository
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
        return Eqitems::class;
    }
}
