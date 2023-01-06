<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contractpenalty
 * @package App\Models
 * @version December 19, 2022, 2:37 pm UTC
 *
 * @property integer $contract_id
 * @property integer $partnercontract_id
 * @property integer $penaltytypes_id
 * @property integer $constructionphase_id
 * @property string $deadline
 * @property string $performance
 * @property string $commit
 */
class Contractpenalty extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contractpenalty';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contract_id',
        'partnercontract_id',
        'penaltytypes_id',
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
        'partnercontract_id' => 'integer',
        'penaltytypes_id' => 'integer',
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
        'partnercontract_id' => 'required|integer',
        'penaltytypes_id' => 'required|integer',
        'constructionphase_id' => 'required|integer',
        'deadline' => 'required',
        'performance' => 'nullable',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function partnercontract() {
        return $this->belongsTo(Contract::class);
    }

    public function penaltytypes() {
        return $this->belongsTo(Penaltytypes::class);
    }

    public function constructionphase() {
        return $this->belongsTo(Constructionphase::class);
    }


}
