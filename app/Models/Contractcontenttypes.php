<?php

namespace App\Models;

use App\Classes\Utility\utilityClass;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contractcontenttypes
 * @package App\Models
 * @version October 5, 2022, 9:42 am UTC
 *
 * @property string $name
 * @property integer $types
 * @property string $commit
 */
class Contractcontenttypes extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contractcontenttypes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'types',
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
        'types' => 'integer',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'types' => 'required|integer',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'typeName'
    ];

    public function getTypeNameAttribute() {
        return $this->types >= 0 ? utilityClass::witchContract($this->types) : '';
    }

    public function contractcontent() {
        return $this->hasMany(Contractcontent::class);
    }


}
