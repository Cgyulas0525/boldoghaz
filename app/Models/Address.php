<?php

namespace App\Models;

use DB;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models
 * @version September 6, 2022, 6:12 am UTC
 *
 * @property integer $table_id
 * @property integer $parent_id
 * @property integer $addresstype_id
 * @property integer $postcode
 * @property string $settlement
 * @property string $address
 * @property string $commit
 * @property integer $prime
 * @property integer $active
 */
class Address extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'address';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'table_id',
        'parent_id',
        'addresstypes_id',
        'postcode',
        'settlement',
        'address',
        'commit',
        'prime',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'table_id' => 'integer',
        'parent_id' => 'integer',
        'addresstypes_id' => 'integer',
        'postcode' => 'integer',
        'settlement' => 'string',
        'address' => 'string',
        'commit' => 'string',
        'prime' => 'integer',
        'active' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'table_id' => 'nullable|integer',
        'parent_id' => 'nullable|integer',
        'addresstypes_id' => 'nullable|integer',
        'postcode' => 'nullable|integer',
        'settlement' => 'nullable|string|max:100',
        'address' => 'nullable|string|max:250',
        'commit' => 'nullable|string|max:500',
        'prime' => 'required|integer',
        'active' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'fullAddress',
        'typeName',
        'parentName',
        'primeValue',
        'activeValue'
    ];

    public function getFullAddressAttribute() {
        return $this->postcode . '. ' . $this->settlement . ', ' . $this->address;
    }

    public function getTypeNameAttribute() {
        return !empty($this->addresstypes_id) ? Addresstypes::find($this->addresstypes_id)->name : '';
    }

    public function getParentNameAttribute() {
        return DB::table($this->tables->name)->find($this->parent_id)->name;
    }

    public function addresstypes() {
        return $this->belongsTo(Addresstypes::class);
    }

    public function tables()
    {
        return $this->belongsTo(Tables::class, 'table_id');
    }

    public function getPrimeValueAttribute() {
        return $this->prime == 0 ? 'Nem' : 'Igen';
    }

    public function getActiveValueAttribute() {
        return $this->active == 0 ? 'Nem' : 'Igen';
    }

}
