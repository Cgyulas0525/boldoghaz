<?php

namespace App\Http\Controllers;

use App\Models\Partnerspartnertypes;
use Illuminate\Http\Request;

class OwnerpartnerController extends Controller
{

    public static function getOwnerPartner() {
        $ownerPartner = Partnerspartnertypes::where('partnertypes_id', 1)->first();
        return !empty($ownerPartner) ? $ownerPartner : null;
    }

    public static function getOwnerPartnerId() {
        $ownerPartner = Partnerspartnertypes::where('partnertypes_id', 1)->first();
        return !empty($ownerPartner) ? $ownerPartner->partner_id : null;
    }
}
