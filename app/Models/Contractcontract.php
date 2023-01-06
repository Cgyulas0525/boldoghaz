<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contractcontract
 * @package App\Models
 * @version December 20, 2022, 10:07 am UTC
 *
 * @property integer $id
 * @property integer $contract_id
 * @property integer $partnercontract_id
 * @property integer $constructionphase_id
 * @property string $document_name
 * @property string $document_urt
 * @property string $deadline
 * @property string $settlementdate
 * @property integer $amount
 * @property string $commit
 */
class Contractcontract extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contractcontract';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'contract_id',
        'partnercontract_id',
        'constructionphase_id',
        'document_name',
        'document_urt',
        'deadline',
        'settlementdate',
        'amount',
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
        'constructionphase_id' => 'integer',
        'document_name' => 'string',
        'document_urt' => 'string',
        'deadline' => 'date',
        'settlementdate' => 'date',
        'amount' => 'integer',
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
        'constructionphase_id' => 'required|integer',
        'document_name' => 'required|string|max:100',
        'document_urt' => 'required|string|max:100',
        'deadline' => 'required',
        'settlementdate' => 'nullable',
        'amount' => 'required|integer',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function partnercontract() {
        return $this->belongsTo(Contract::class, 'partnercontract_id');
    }

    public function constructionphase() {
        return $this->belongsTo(Constructionphase::class);
    }


}
