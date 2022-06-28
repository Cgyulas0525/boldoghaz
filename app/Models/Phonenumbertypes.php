<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Phonenumbertypes
 * @package App\Models
 * @version June 27, 2022, 7:48 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $phonenumbers
 * @property string $name
 * @property string $commit
 */
class Phonenumbertypes extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'phonenumbertypes';
    
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
        'name' => 'nullable|string|max:100',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function phonenumbers()
    {
        return $this->hasMany(\App\Models\Phonenumber::class, 'phonenumbertypes_id');
    }
}
