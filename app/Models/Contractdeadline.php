<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contractdeadline
 * @package App\Models
 * @version November 18, 2022, 8:47 am UTC
 *
 * @property integer $contract_id
 * @property integer $constructionphase_id
 * @property string $deadline
 * @property string $performance
 * @property string $commit
 */
class Contractdeadline extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contractdeadline';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contract_id',
        'constructionphase_id',
        'deadline',
        'performance',
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
        'constructionphase_id' => 'integer',
        'deadline' => 'date',
        'performance' => 'date',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contract_id' => 'required|integer',
        'constructionphase_id' => 'required|integer',
        'deadline' => 'required',
        'performance' => 'nullable',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function contractdeadlineitem() {
        return $this->hasMany(Contractdeadlineitem::class);
    }

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function constructionphase() {
        return $this->belongsTo(Constructionphase::class);
    }

}
