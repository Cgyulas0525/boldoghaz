<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\PrimeChangeController;

use App\Models\Partnerbankaccounts;

/**
 * Class Partners
 * @package App\Models
 * @version September 6, 2022, 6:12 am UTC
 *
 * @property string $name
 * @property string $registrationnumber
 * @property string $taxnumber
 * @property integer $live
 * @property string $commit
 */
class Partners extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'partners';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'registrationnumber',
        'taxnumber',
        'live',
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
        'registrationnumber' => 'string',
        'taxnumber' => 'string',
        'live' => 'integer',
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'registrationnumber' => 'nullable|string|max:25',
        'taxnumber' => 'required|string|max:25',
        'live' => 'required|integer',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'liveName',
        'primeAddress',
        'primeEmail',
        'primePhoneNumber',
        'primeBankAccount'
    ];

    public function getLiveNameAttribute() {
        return $this->live == 0 ? "Nem" : ($this->live == 1 ? "Igen" : "Nincs érték");
    }

    public function getPrimeAddressAttribute() {
        $data = PrimeChangeController::getPrime('Address', $this->id);
        return !empty($data) ? $data->fullAddress : 'Nincs elsődleges cím!';
    }

    public function getPrimeEmailAttribute() {
        $data = PrimeChangeController::getPrime('Emails', $this->id);
        return !empty($data) ? $data->phonenumber : 'Nincs elsődleges email cím!';
    }

    public function getPrimePhoneNumberAttribute() {
        $data = PrimeChangeController::getPrime('Phonenumber', $this->id);
        return !empty($data) ? $data->email : 'Nincs elsődleges telefonszám!';
    }

    public function getPrimeBankAccountAttribute() {
        $data = Partnerbankaccounts::where('partners_id', $this->id)
                                   ->where('prime', 1)
                                   ->first();
        return !empty($data) ? $data->accountnumber : 'Nincs elsődleges bankszámla!';
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partnerbankaccount()
    {
        return $this->hasMany(\App\Models\Partnerbankaccounts::class, 'partners_id');
    }

    public function partnerpartnertypes()
    {
        return $this->hasMany(\App\Models\Partnerspartnertypes::class, 'partner_id');
    }

    public function contractCustomer() {
        return $this->hasMany('App\Models\Contract', 'customer');
    }

    public function entrepeneurCustomer() {
        return $this->hasMany('App\Models\Contract', 'entrepeneur');
    }

}
