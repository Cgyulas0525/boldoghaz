<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contractnoncontent
 * @package App\Models
 * @version November 7, 2022, 2:05 pm UTC
 *
 * @property integer $contract_id
 * @property integer $contractnoncontenttypes_id
 * @property string $commit
 */
class Contractnoncontent extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contractnoncontent';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contract_id',
        'contractnoncontenttypes_id',
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
        'contractnoncontenttypes_id' => 'integer',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contract_id' => 'required|integer',
        'contractnoncontenttypes_id' => 'required|integer',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function contract() {
        return $this->belongsTo(contract::class);
    }

    public function contractnoncontenttypes() {
        return $this->belongsTo(contractnoncontenttypes::class);
    }


}
