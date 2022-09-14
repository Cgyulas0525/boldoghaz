<?php

namespace App\Classes\Partners;

use DB;
use App\Models\Partnertypes;

class partnerDataDDDWClass
{

    public static function typesNotInPartnerspartnertypes($partner_id) {
        return [" "] + Partnertypes::whereNotIn('id', function ($query) {
            $query->from('partnerspartnertypes')->select('partnertypes_id')->where('partner_id', 1)->get();
        })->pluck('name', 'id')->toArray();
    }

    public static function typesNotInPartnerspartnertypesModify($partner_id, $types_id) {
        $pt1 = DB::table('partnertypes')->whereNotIn('id', function ($query) use ($partner_id) {
            $query->from('partnerspartnertypes')->select('partnertypes_id')->where('partner_id', $partner_id)->get();
        });

        $pt2 = DB::table('partnertypes')->where('id', $types_id)->union($pt1);

        return [" "] + DB::query()->fromSub($pt2, 'data')->pluck('name', 'id')->toArray();
    }

}
