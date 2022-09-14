<?php

namespace App\Repositories;

use App\Models\Partners;
use App\Repositories\BaseRepository;

/**
 * Class PartnersRepository
 * @package App\Repositories
 * @version September 6, 2022, 6:12 am UTC
*/

class PartnersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'registrationnumber',
        'taxnumber',
        'live',
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
        return Partners::class;
    }
}
