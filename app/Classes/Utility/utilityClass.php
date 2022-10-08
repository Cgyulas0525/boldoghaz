<?php

namespace App\Classes\Utility;

use App\Models\Partners;
use App\Models\Tables;

class utilityClass
{
    public static function yesNoDDDW() {
        return ["Nem", "Igen"];
    }

    public static function yesNo($value) {
        return $value == 0 ? "Nem" : ($value == 1 ? "Igen" : "Nincs érték");
    }

    public static function getTableId($name) {
        $table = Tables::where('name', $name)->first();
        return !empty($table) ? $table->id : -9999;
    }

    public static function getPartnerName($id) {
        return Partners::find($id)->name;
    }

    public static function witchContractDDDW() {
        return ['Mind kettő', 'Vállalkozói', 'Alvállalkozói'];
    }

    public static function witchContract($value) {
        return ($value == 0 ? 'Mind kettő' : ($value == 1 ? 'Vállalkozói' : 'Alvállalkozói'));
    }

    public static function protectedRecord($tableName, $id) {
        $table = Tables::where('name', $tableName)->first();
        return $table->protectedrecords >= $id ? true : false;
    }
}
