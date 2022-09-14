<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Partnerspartnertypes
 * @package App\Models
 * @version September 6, 2022, 6:27 am UTC
 *
 * @property integer $partner_id
 * @property integer $partnertypes_id
 * @property string $commit
 */
class Partnerspartnertypes extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'partnerspartnertypes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'partner_id',
        'partnertypes_id',
        'commit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'partner_id' => 'integer',
        'partnertypes_id' => 'integer',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'partner_id' => 'nullable|integer',
        'partnertypes_id' => 'nullable|integer',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'partnerName',
        'typesName'
    ];

    public function getPartnerNameAttribute() {
        return !empty($this->partner_id) ? Partners::find($this->partner_id)->name : '';
    }

    public function getTypesNameAttribute() {
        return !empty($this->partnertypes_id) ? Partnertypes::find($this->partnertypes_id)->name : '';
    }

}
