<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\BaseRepository;

/**
 * Class AddressRepository
 * @package App\Repositories
 * @version September 6, 2022, 6:12 am UTC
*/

class AddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'table_id',
        'parent_id',
        'addresstype_id',
        'postcode',
        'settlement',
        'address',
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
        return Address::class;
    }
}
