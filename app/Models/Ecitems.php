<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ecitems
 * @package App\Models
 * @version November 5, 2022, 7:54 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $ececitems
 * @property string $name
 * @property string $commit
 */
class Ecitems extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ecitems';
    
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
    public function ececitems()
    {
        return $this->hasMany(\App\Models\Ececitem::class, 'ecitems_id');
    }
}
