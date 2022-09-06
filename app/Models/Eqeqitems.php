<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Eqeqitems
 * @package App\Models
 * @version August 26, 2022, 12:14 pm UTC
 *
 * @property integer $equipmenttypes_id
 * @property integer $eqitems_id
 * @property integer $valuelimit
 * @property string $commit
 */
class Eqeqitems extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'eqeqitems';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'equipmenttypes_id',
        'eqitems_id',
        'valuelimit',
        'commit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'equipmenttypes_id' => 'integer',
        'eqitems_id' => 'integer',
        'valuelimit' => 'integer',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'equipmenttypes_id' => 'required|integer',
        'eqitems_id' => 'required|integer',
        'valuelimit' => 'nullable|integer',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'eqName',
        'eqItemName'
    ];


    public function getEqItemNameAttribute() {
        return !empty($this->eqitems_id) ? Eqitems::find($this->eqitems_id)->name : '';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function eqitems()
    {
        return $this->belongsTo(\App\Models\Eqitems::class, 'eqitems_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipmenttypes()
    {
        return $this->belongsTo(\App\Models\Equipmenttypes::class, 'equipmenttypes_id');
    }

}
