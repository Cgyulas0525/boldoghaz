<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Settlements
 * @package App\Models
 * @version September 3, 2022, 6:16 am UTC
 *
 * @property string $settlement
 * @property string $postalcode
 * @property string $county
 * @property string $area
 */
class Settlements extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'settlements';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'settlement',
        'postalcode',
        'county',
        'area'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'settlement' => 'string',
        'postalcode' => 'string',
        'county' => 'string',
        'area' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'settlement' => 'required|string|max:100',
        'postalcode' => 'required|string|max:10',
        'county' => 'required|string|max:100',
        'area' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'pcSettlement',
        'settlementPC'
    ];

    public function getPcSettlementAttribute() {
        return $this->poctalcode . '-' . $this->settlement;
    }

    public function getSettlementPCAttribute() {
        return $this->settlement . '-' . $this->poctalcode;
    }


}
