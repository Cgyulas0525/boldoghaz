<?php

namespace App\Classes\Partners;

use DB;
use App\Models\Partnertypes;

class partnerDataDDDWClass
{

    public static function typesNotInPartnerspartnertypes($partner_id, $owner = null) {
        return [" "] + Partnertypes::query()->when($owner, function($query, $owner){
                $query->where('id', '!=', $owner)->get();
            })->whereNotIn('id', function ($query) use ($partner_id){
                $query->from('partnerspartnertypes')->select('partnertypes_id')->where('partner_id', $partner_id)->whereNull('deleted_at')->get();
            })->pluck('name', 'id')->toArray();
    }

    public static function typesNotInPartnerspartnertypesModify($partner_id, $types_id, $owner = null) {
        $pt1 = DB::table('partnertypes')->when($owner, function($query, $owner){
            $query->where('id', '!=', $owner)->get();
        })->whereNotIn('id', function ($query) use ($partner_id) {
            $query->from('partnerspartnertypes')->select('partnertypes_id')->where('partner_id', $partner_id)->whereNull('deleted_at')->get();
        });

        $pt2 = DB::table('partnertypes')->where('id', $types_id)->union($pt1);

        return [" "] + DB::query()->fromSub($pt2, 'data')->pluck('name', 'id')->toArray();
    }

}
