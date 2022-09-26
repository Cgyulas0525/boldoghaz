<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use DB;

/**
 * Class Emails
 * @package App\Models
 * @version September 6, 2022, 6:14 am UTC
 *
 * @property integer $table_id
 * @property integer $parent_id
 * @property string $email
 * @property string $commit
 */
class Emails extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'emails';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'table_id',
        'parent_id',
        'email',
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
        'email' => 'string',
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
        'email' => 'nullable|string|max:100',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'parentName'
    ];

    public function getParentNameAttribute() {
        return DB::table($this->tables->name)->find($this->parent_id)->name;
    }

    public function tables()
    {
        return $this->belongsTo(\App\Models\Tables::class, 'table_id');
    }

}
