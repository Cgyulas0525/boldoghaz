<?php

namespace App\Classes\Settlement;

use App\Models\Settlements;
use DB;
use Illuminate\Http\Request;
use Response;

class settlementClass
{
    public static function settlementPostcodeDDDW() {
        return [" "] + DB::table('settlements')->pluck(DB::raw("Concat(settlement, '-' , postalcode) as spc"), 'id')->toArray();
    }

    public static function postcodeSettlementsDDDW($postcode = null) {
        return [" "] + DB::table('settlements')->where( function($query) use ($postcode) {
                if (is_null($postcode)) {
                    $query->whereNotNull('postalcode');
                } else {
                    $query->where('postalcode', $postcode);
                }
            })->distinct('settlement')->pluck('settlement', 'settlement')->toArray();
    }

    public static function postalcodeSettlementsDDDW(Request $request) {
        return Response::json(DB::table('settlements')
                        ->where('postalcode', $request->postalcode)
                        ->select('settlement as id', 'settlement')
                        ->distinct('settlement')
                        ->get());
    }

    public static function countiesDDDW() {
        return [" "] + DB::table('settlements')->distinct('county')->pluck('county', 'county')->toArray();
    }

    public static function areasDDDW($county) {
        return [" "] + DB::table('settlements')->where('county', $county)->distinct('area')->pluck('area', 'area')->toArray();
    }

    public static function postcodeDDDW() {
        return [" "] + DB::table('settlements')->distinct('postalcode')->pluck('postalcode', 'postalcode')->toArray();
    }

}

