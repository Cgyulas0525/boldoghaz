<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Financialinstitutions
 * @package App\Models
 * @version September 13, 2022, 12:31 pm UTC
 *
 * @property string $name
 * @property string $commit
 */
class Financialinstitutions extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'financialinstitutions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'commit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partnerbankaccount()
    {
        return $this->hasMany(\App\Models\Partnerbankaccounts::class, 'financialinstitutions_id');
    }



}
