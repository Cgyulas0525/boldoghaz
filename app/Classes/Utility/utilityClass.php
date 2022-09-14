<?php

namespace App\Classes\Utility;

use App\Models\Partners;
use App\Models\Tables;

class utilityClass
{
    public static function igenNemDDDW() {
        return ["Nem", "Igen"];
    }

    public static function igenNem($ertek) {
        return $ertek == 0 ? "Nem" : ($ertek == 1 ? "Igen" : "Nincs érték");
    }

    public static function getTableId($name) {
        $table = Tables::where('name', $name)->first();
        return !empty($table) ? $table->id : -9999;
    }

    public static function getPartnerName($id) {
        return Partners::find($id)->name;
    }

}
