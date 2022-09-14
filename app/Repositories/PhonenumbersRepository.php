<?php

namespace App\Repositories;

use App\Models\Phonenumbers;
use App\Repositories\BaseRepository;

/**
 * Class PhonenumbersRepository
 * @package App\Repositories
 * @version September 6, 2022, 6:15 am UTC
*/

class PhonenumbersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'table_id',
        'parent_id',
        'phonenumbertypes_id',
        'phonenumber',
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
        return Phonenumbers::class;
    }
}
