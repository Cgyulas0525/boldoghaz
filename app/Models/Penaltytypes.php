<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Penaltytypes
 * @package App\Models
 * @version October 11, 2022, 9:21 am UTC
 *
 * @property string $name
 * @property integer $businessrate
 * @property integer $daypenalty
 * @property integer $daypenaltymax
 * @property string $commit
 */
class Penaltytypes extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'penaltytypes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'businessrate',
        'daypenalty',
        'daypenaltymax',
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
        'businessrate' => 'integer',
        'daypenalty' => 'integer',
        'daypenaltymax' => 'integer',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'businessrate' => 'required|integer',
        'daypenalty' => 'required|integer',
        'daypenaltymax' => 'required|integer',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function contractpenalty() {
        return $this->hasMany(Contractpenalty::class);
    }

}
