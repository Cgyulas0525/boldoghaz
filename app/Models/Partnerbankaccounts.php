<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Partnerbankaccounts
 * @package App\Models
 * @version September 13, 2022, 12:45 pm UTC
 *
 * @property integer $partners_id
 * @property integer $financialinstitutions_id
 * @property string $accountnumber
 * @property string $commit
 */
class Partnerbankaccounts extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'partnerbankaccounts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'partners_id',
        'financialinstitutions_id',
        'accountnumber',
        'commit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'partners_id' => 'integer',
        'financialinstitutions_id' => 'integer',
        'accountnumber' => 'string',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'partners_id' => 'required|integer',
        'financialinstitutions_id' => 'required|integer',
        'accountnumber' => 'required|string|max:30',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function financialinstitutions()
    {
        return $this->belongsTo(\App\Models\Financialinstitutions::class, 'financialinstitutions_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function partners()
    {
        return $this->belongsTo(\App\Models\Partners::class);
    }

    protected $append = [
        'partnerName',
        'institutName'
    ];

    public function getPartnerNameAttribute() {
        return !empty($this->partners_id) ? Partners::find($this->partners_id)->name : '';
    }

    public function getInstitutNameAttribute() {
        return !empty($this->financialinstitutions_id) ? Financialinstitutions::find($this->financialinstitutions_id)->name : '';
    }

}
