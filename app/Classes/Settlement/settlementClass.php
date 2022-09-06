<?php

namespace App\Classes\Settlement;

use App\Models\Settlements;
use DB;

class settlementClass
{
    public static function settlementPostalcodeDDDW() {
        return [" "] + DB::table('settlements')->pluck(DB::raw("Concat(settlement, '-' , postalcode) as spc"), 'id')->toArray();
    }

    public static function postalcodeSettlementsDDDW($postalcode) {
        return [" "] + DB::table('settlements')->where('postalcode', $postalcode)->pluck('settlement', 'id')->toArray();
    }

    public static function countiesDDDW() {
        return [" "] + DB::table('settlements')->distinct('county')->pluck('county', 'county')->toArray();
    }

    public static function areasDDDW($county) {
        return [" "] + DB::table('settlements')->where('county', $county)->distinct('area')->pluck('area', 'area')->toArray();
    }

}
