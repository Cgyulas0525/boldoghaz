<?php

namespace App\Repositories;

use App\Models\Tables;
use App\Repositories\BaseRepository;

/**
 * Class TablesRepository
 * @package App\Repositories
 * @version June 27, 2022, 6:58 am UTC
*/

class TablesRepository extends BaseRepository
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
        return Tables::class;
    }
}
