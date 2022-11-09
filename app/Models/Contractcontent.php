<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contractcontent
 * @package App\Models
 * @version November 5, 2022, 8:06 am UTC
 *
 * @property integer $contract_id
 * @property integer $contractcontenttypes_id
 * @property string $commit
 */
class Contractcontent extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contractcontent';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contract_id',
        'contractcontenttypes_id',
        'commit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contract_id' => 'integer',
        'contractcontenttypes_id' => 'integer',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contract_id' => 'required|integer',
        'contractcontenttypes_id' => 'required|integer',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function contract() {
        return $this->belongsTo(contract::class);
    }

    public function contractcontenttypes() {
        return $this->belongsTo(contractcontenttypes::class);
    }

}
