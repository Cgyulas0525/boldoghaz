<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tables
 * @package App\Models
 * @version June 27, 2022, 6:58 am UTC
 *
 * @property string $name
 * @property integer $protactedrecords
 * @property string $commit
 */
class Tables extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tables';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'protectedrecords',
        'commit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'protectedrecords' => 'integer',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'protectedrecords' => 'required|integer',
        'commit' => 'required|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function phones(){
        return $this->hasMany('App\Models\Phonenumbers', 'table_id');
    }

    public function address(){
        return $this->hasMany('App\Models\Address', 'table_id');
    }

}
