<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use DB;

/**
 * Class Phonenumbers
 * @package App\Models
 * @version September 6, 2022, 6:15 am UTC
 *
 * @property \App\Models\Table $table
 * @property \App\Models\Phonenumbertype $phonenumbertypes
 * @property integer $table_id
 * @property integer $parent_id
 * @property integer $phonenumbertypes_id
 * @property string $phonenumber
 * @property string $commit
 */
class Phonenumbers extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'phonenumbers';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'table_id',
        'parent_id',
        'phonenumbertypes_id',
        'phonenumber',
        'commit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'table_id' => 'integer',
        'parent_id' => 'integer',
        'phonenumbertypes_id' => 'integer',
        'phonenumber' => 'string',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'table_id' => 'nullable|integer',
        'parent_id' => 'nullable|integer',
        'phonenumbertypes_id' => 'nullable|integer',
        'phonenumber' => 'nullable|string|max:100',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tables()
    {
        return $this->belongsTo(\App\Models\Tables::class, 'table_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function phonenumbertypes()
    {
        return $this->belongsTo(\App\Models\Phonenumbertypes::class, 'phonenumbertypes_id');
    }

    protected $append = [
        'typeName',
        'parentName'
    ];

    public function getTypeNameAttribute() {
        return !empty($this->phonenumbertypes_id) ? Phonenumbertypes::find($this->phonenumbertypes_id)->name : '';
    }

    public function getParentNameAttribute() {
        return DB::table($this->tables->name)->find($this->parent_id)->name;
    }


}
