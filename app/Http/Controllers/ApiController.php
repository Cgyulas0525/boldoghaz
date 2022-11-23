<?php

namespace App\Http\Controllers;

use App\Models\Ecitems;
use App\Models\Partners;
use Illuminate\Http\Request;
use Response;
use DB;
use App\Classes\ptClass;
use App\Classes\Contract\contractChild;

use App\Models\Contractcontenttypes;

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
        return Response::json($ptc->selectData('Partnertypes'));
    }

    public function changePartnerLive(Request $request) {
        $partner = Partners::find($request->id);
        $partner->live = $request->live == 0 ? 1 : 0;
        $partner->save();
        return redirect(route('partners.index'));
    }

    public function contractTypesNotIn(Request $request) {
        return DB::table($request->table.'types')->whereNotIn('id', function ($query) use($request) {
            return $query->from($request->table)->select($request->table.'types_id')->where('contract_id', $request->id)->whereNull('deleted_at')->get();
        })->get()->count();
    }

    public function apiAllButton(Request $request) {
        $cc = new contractChild();
        $cc->allRecords($request->table, $request->id);
    }
}
