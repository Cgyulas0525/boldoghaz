<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\DDDW;

class DDDWController extends Controller
{

    public static function basicDDDW($model, $where = null) {
        $dddw = new DDDW($model, $where);
        return $dddw->basicDDDW();
    }
}

//pl:
//$where = [
//    "id" => ["op" => ">", "values" => "1"],
//    "tipus" => ["op" => ">", "values" => ["1", "2"]],
//    "name" => ["op" => "=", "values" => "kivitelező"]
//];
//$data = App\Http\Controllers\DDDWController::alapDDDW('partnertypes', $where);
//
//dd($data);
