<?php

namespace App\Repositories;

use App\Models\Partnerspartnertypes;
use App\Repositories\BaseRepository;

/**
 * Class PartnerspartnertypesRepository
 * @package App\Repositories
 * @version September 6, 2022, 6:27 am UTC
*/

class PartnerspartnertypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'partner_id',
        'partnertypes_id',
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
        return Partnerspartnertypes::class;
    }
}
