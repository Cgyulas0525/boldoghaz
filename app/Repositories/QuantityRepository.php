<?php

namespace App\Repositories;

use App\Models\Quantity;
use App\Repositories\BaseRepository;

/**
 * Class QuantityRepository
 * @package App\Repositories
 * @version August 18, 2022, 9:43 am UTC
*/

class QuantityRepository extends BaseRepository
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
        return Quantity::class;
    }
}
