<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contractvismaior
 * @package App\Models
 * @version December 9, 2022, 10:17 am UTC
 *
 * @property integer $contract_id
 * @property integer $vismaiortypes_id
 * @property string $document_name
 * @property string $document_url
 * @property string $vismaiordate
 * @property string $commit
 */
class Contractvismaior extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contractvismaior';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contract_id',
        'vismaiortypes_id',
        'document_name',
        'document_url',
        'vismaiordate',
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
        'vismaiortypes_id' => 'integer',
        'document_name' => 'string',
        'document_url' => 'string',
        'vismaiordate' => 'date',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contract_id' => 'required|integer',
        'vismaiortypes_id' => 'required|integer',
        'document_name' => 'nullable|string|max:100',
        'document_url' => 'nullable|string|max:100',
        'vismaiordate' => 'required',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'required',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function vismaiortypes() {
        return $this->belongsTo(Vismaiortypes::class);
    }

}
