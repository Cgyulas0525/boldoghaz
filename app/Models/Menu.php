<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Menu
 * @package App\Models
 * @version October 4, 2022, 7:22 am UTC
 *
 * @property integer $parent_id
 * @property string $name
 * @property string $icon
 * @property string $route
 * @property string $request
 * @property integer $parenticon
 * @property integer $userstatus_id
 */
class Menu extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'menu';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'parent_id',
        'name',
        'icon',
        'route',
        'request',
        'parenticon',
        'userstatus_id'
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
        'icon' => 'string',
        'route' => 'string',
        'request' => 'string',
        'parenticon' => 'integer',
        'userstatus_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent_id' => 'required|integer',
        'name' => 'required|string|max:100',
        'icon' => 'required|string|max:100',
        'route' => 'required|string|max:100',
        'request' => 'required|string|max:100',
        'parenticon' => 'required|integer',
        'userstatus_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function childs() {
        return $this->hasMany('App\Models\Menu','parent_id','id') ;
    }
}
