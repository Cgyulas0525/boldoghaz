<?php

namespace App\Repositories;

use App\Models\Emails;
use App\Repositories\BaseRepository;

/**
 * Class EmailsRepository
 * @package App\Repositories
 * @version September 6, 2022, 6:14 am UTC
*/

class EmailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'table_id',
        'parent_id',
        'email',
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
        return Emails::class;
    }
}
