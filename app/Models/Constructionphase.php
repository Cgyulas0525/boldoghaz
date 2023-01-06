<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Classes\ptClass;

/**
 * Class Constructionphase
 * @package App\Models
 * @version October 17, 2022, 9:44 am UTC
 *
 * @property integer $parent_id
 * @property string $name
 * @property string $commit
 */
class Constructionphase extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'constructionphase';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'parent_id',
        'name',
        'commit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'name' => 'string',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent_id' => 'nullable|integer',
        'name' => 'required|string|max:100',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'parentName',
        'parentFullName'
    ];


    public function childs(){
        return $this->hasMany(Constructionphase::class, 'parent_id');
    }

    public function parent(){
        return $this->belongsTo(Constructionphase::class, 'parent_id');
    }


    public function getParentNameAttribute() {
        return !empty($this->parent_id) ? Constructionphase::find($this->parent_id)->name : '';
    }

    public function getParentFullNameAttribute() {
        $ptc = new ptClass();
        return !empty($this->parent_id) ? $ptc->recordFullName('Constructionphase', $this->parent_id, $this->name) : $this->name;
    }

    public function contractpenalty() {
        return $this->hasMany(Contractpenalty::class);
    }

    public function contractcontract() {
        return $this->hasMany(Contractcontract::class);
    }


}
