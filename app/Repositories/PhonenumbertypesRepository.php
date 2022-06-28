<?php

namespace App\Repositories;

use App\Models\Phonenumbertypes;
use App\Repositories\BaseRepository;

/**
 * Class PhonenumbertypesRepository
 * @package App\Repositories
 * @version June 27, 2022, 7:48 am UTC
*/

class PhonenumbertypesRepository extends BaseRepository
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
        return Phonenumbertypes::class;
    }
}
