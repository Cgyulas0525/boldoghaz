<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ececitems
 * @package App\Models
 * @version August 19, 2022, 5:42 am UTC
 *
 * @property \App\Models\Ecitem $ecitems
 * @property \App\Models\Energyclassification $energyclassifications
 * @property \App\Models\Heatingtype $heatingtypes
 * @property \App\Models\Quantity $quantity
 * @property integer $energyclassifications_id
 * @property integer $ecitems_id
 * @property integer $heatingtypes_id
 * @property integer $quantity_id
 * @property integer $piece
 */
class Ececitems extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ececitems';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'energyclassifications_id',
        'ecitems_id',
        'heatingtypes_id',
        'quantity_id',
        'piece'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'energyclassifications_id' => 'integer',
        'ecitems_id' => 'integer',
        'heatingtypes_id' => 'integer',
        'quantity_id' => 'integer',
        'piece' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'energyclassifications_id' => 'required|integer',
        'ecitems_id' => 'required|integer',
        'heatingtypes_id' => 'nullable|integer',
        'quantity_id' => 'nullable|integer',
        'piece' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'ecName',
        'ecItemName',
        'heatingtypeName',
        'quantityName'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ecitems()
    {
        return $this->belongsTo(\App\Models\Ecitem::class, 'ecitems_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function energyclassifications()
    {
        return $this->belongsTo(\App\Models\Energyclassification::class, 'energyclassifications_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function heatingtypes()
    {
        return $this->belongsTo(\App\Models\Heatingtype::class, 'heatingtypes_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function quantity()
    {
        return $this->belongsTo(\App\Models\Quantity::class, 'quantity_id');
    }

    public function getEcNameAttribute() {
        return !empty($this->energyclassifications_id) ? EnergyClassifications::find($this->energyclassifications_id)->name : '';
    }

    public function getEcItemNameAttribute() {
        return !empty($this->ecitems_id) ? Ecitems::find($this->ecitems_id)->name : '';
    }

    public function getHeatingtypeNameAttribute() {
        return !empty($this->heatingtypes_id) ? Heatingtypes::find($this->heatingtypes_id)->name : '';
    }

    public function getQuantityNameAttribute() {
        return !empty($this->quantity_id) ? Quantity::find($this->quantity_id)->name : '';
    }

}
