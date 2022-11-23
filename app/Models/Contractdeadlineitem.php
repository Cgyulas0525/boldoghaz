<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contractdeadlineitem
 * @package App\Models
 * @version November 18, 2022, 8:48 am UTC
 *
 * @property integer $contractdeadline_id
 * @property string $deadline
 * @property string $performance
 * @property string $commit
 */
class Contractdeadlineitem extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contractdeadlineitem';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contractdeadline_id',
        'deadline',
        'performance',
        'commit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contractdeadline_id' => 'integer',
        'deadline' => 'date',
        'performance' => 'date',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contractdeadline_id' => 'required|integer',
        'deadline' => 'required',
        'performance' => 'nullable',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function contractdeadline() {
        return $this->belongsTo(Contractdeadline::class);
    }

}
