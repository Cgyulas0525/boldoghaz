<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use DB;

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
        'addresstype_id',
        'postcode',
        'settlement',
        'address',
        'commit'
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
        'addresstype_id' => 'integer',
        'postcode' => 'integer',
        'settlement' => 'string',
        'address' => 'string',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'table_id' => 'nullable|integer',
        'parent_id' => 'nullable|integer',
        'addresstype_id' => 'nullable|integer',
        'postcode' => 'nullable|integer',
        'settlement' => 'nullable|string|max:100',
        'address' => 'nullable|string|max:250',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'fullAddress',
        'typeName',
        'parentName'
    ];

    public function getFullAddressAttribute() {
        return $this->postcode . '. ' . $this->settlement . ', ' . $this->address;
    }

    public function getTypeNameAttribute() {
        return !empty($this->addresstype_id) ? Addresstypes::find($this->addresstype_id)->name : '';
    }

    public function getParentNameAttribute() {
        $table = Tables::find($this->table_id)->name;
        return DB::table($table)->find($this->parent_id)->name;
    }

}
