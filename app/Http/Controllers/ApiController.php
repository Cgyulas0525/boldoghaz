<?php

namespace App\Http\Controllers;

use App\Models\Ecitems;
use Illuminate\Http\Request;
use Response;
use App\Classes\ptClass;

class ApiController extends Controller
{
    public function ecitemsNotInEC(Request $request)
    {
        return Ecitems::whereNotIn('id', function($query) use($request) {
            $query->from('ececitems')->select('ecitems_id')->where('energyclassifications_id', $request->id)->get();
        })->get()->count();
    }

    public function partnerTypes(Request $request) {
        $ptc = new ptClass();
        return Response::json($ptc->selectData());
    }
}

