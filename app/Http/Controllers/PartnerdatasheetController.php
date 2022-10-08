<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;

use App\Models\Address;
use App\Models\Emails;
use App\Models\Partnerbankaccounts;
use App\Models\Partners;
use App\Models\Partnerspartnertypes;

use App\Models\Phonenumbers;
use App\Models\Tables;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

use utilityClass;

class PartnerdatasheetController extends Controller
{
    public $tableId = null;

    /**
     * Display a listing of the Partnerspartnertypes.
     *
     * @param Request $request
     * @param Partners $partner
     *
     * @return Response
     */
    public function partnerPartnerTypesIndex(Request $request, $id)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = Partnerspartnertypes::where('partner_id', $id)->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('partnerName', function($data) { return $data->partnerName; })
                    ->addColumn('typesName', function($data) { return $data->typesName; })
                    ->addColumn('action', function($row){
                        $btn = '<a href="' . route('partnerspartnertypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                        $btn = $btn.'<a href="' . route('partnerspartnertypes.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

            }

            $partners = Partners::find($id);
            return view('partners.edit')->with('partners', $partners);
        }
    }

    /**
     * Display a listing of the partnerAddress.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function partnerAddressIndex(Request $request, $id)
    {
        if( Auth::check() ){

            $partners = Partners::find($id);

            if ($request->ajax()) {

                $this->tableId = utilityClass::getTableId('partners');
                $data = Address::where('table_id', $this->tableId)
                               ->where('parent_id', $id)
                               ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('fullAddress', function($data) { return $data->fullAddress; })
                    ->addColumn('typeName', function($data) { return $data->typeName; })
                    ->addColumn('primeValue', function($data) { return $data->primeValue; })
                    ->addColumn('activeValue', function($data) { return $data->activeValue; })
                    ->addColumn('action', function($row){
                        $btn = '<a href="' . route('addresses.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                        if ($row->prime != 1) {
                            $btn = $btn.'<a href="' . route('addresses.destroy', [$row->id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

            }

            return view('partners.edit')->with('partners', $partners);
        }
    }


    /**
     * Display a listing of the partnerBankAccounts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function partnerBAIndex(Request $request, $id)
    {
        if( Auth::check() ){

            $partners = Partners::find($id);

            if ($request->ajax()) {

                $data = Partnerbankaccounts::where('partners_id', $id)->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('institutName', function($data) { return $data->institutName; })
                    ->addColumn('partnerName', function($data) { return $data->partnerName; })
                    ->addColumn('primeValue', function($data) { return $data->primeValue; })
                    ->addColumn('activeValue', function($data) { return $data->activeValue; })
                    ->addColumn('action', function($row){
                        $btn = '<a href="' . route('partnerbankaccounts.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                        $btn = $btn.'<a href="' . route('partnerbankaccounts.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

            }

            return view('partners.edit')->with('partners', $partners);
        }
    }

    /**
     * Display a listing of the partnerPhonenumbers.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function partnerPhonenumbersIndex(Request $request, $id)
    {
        if( Auth::check() ){

            $partners = Partners::find($id);

            if ($request->ajax()) {

                $this->tableId = utilityClass::getTableId('partners');
                $data = Phonenumbers::where('table_id', $this->tableId)->where('parent_id', $id)->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('typeName', function($data) { return $data->typeName; })
                    ->addColumn('primeValue', function($data) { return $data->primeValue; })
                    ->addColumn('activeValue', function($data) { return $data->activeValue; })
                    ->addColumn('action', function($row){
                        $btn = '<a href="' . route('phonenumbers.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                        $btn = $btn.'<a href="' . route('phonenumbers.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

            }

            return view('partners.edit')->with('partners', $partners);
        }
    }

    /**
     * Display a listing of the partnerEmails.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function partnerEmailsIndex(Request $request, $id)
    {
        if( Auth::check() ){

            $partners = Partners::find($id);

            if ($request->ajax()) {
                $this->tableId = utilityClass::getTableId('partners');
                $data = Emails::where('table_id', $this->tableId)->where('parent_id', $id)->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('primeValue', function($data) { return $data->primeValue; })
                    ->addColumn('activeValue', function($data) { return $data->activeValue; })
                    ->addColumn('action', function($row){
                        $btn = '<a href="' . route('emails.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                        $btn = $btn.'<a href="' . route('emails.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

            }

            return view('partners.edit')->with('partners', $partners);
        }
    }

    /**
     * Remove the specified Partnerspartnertypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function partnerPartnerTypesDestroy($id)
    {
        $partnerspartnertypes = Partnerspartnertypes::find($id);
        $partners = Partners::find($partnerspartnertypes->partner_id);

        if (empty($partnerspartnertypes)) {
            return view('partners.edit')->with('partners', $partners);
        }

        Partnerspartnertypes::find($id)->delete();
        return view('partners.edit')->with('partners', $partners);
    }

    /**
     * Remove the specified Address from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function addressDestroy($id)
    {
        $address = Address::find($id);
        $partners = Partners::find($address->parent_id);

        if (empty($address)) {
            return view('partners.edit')->with('partners', $partners);
        }

        Address::find($id)->delete();
        return view('partners.edit')->with('partners', $partners);
    }

    /**
     * Remove the specified Phonenumbers from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function phonenumberDestroy($id)
    {
        $phonenumbers = Phonenumbers::find($id);
        $partners = Partners::find($phonenumbers->parent_id);

        if (empty($phonenumbers)) {
            return view('partners.edit')->with('partners', $partners);
        }

        Phonenumbers::find($id)->delete();
        return view('partners.edit')->with('partners', $partners);
    }

    /**
     * Remove the specified Emails from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function peDestroy($id)
    {
        $emails = Emails::find($id);
        $partners = Partners::find($emails->parent_id);

        if (empty($emails)) {
            return redirect(route('emails.index'));
        }

        Emails::find($id)->delete();
        return view('partners.edit')->with('partners', $partners);
    }

    /**
     * Remove the specified Partnerbankaccounts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function pbaDestroy($id)
    {
        $partnerbankaccounts = Partnerbankaccounts::find($id);
        $partners = Partners::find($partnerbankaccounts->parents_id);

        if (empty($partnerbankaccounts)) {
            return redirect(route('partnerbankaccounts.index'));
        }

        Partnerbankaccounts::find($id)->delete();
        return view('partners.edit')->with('partners', $partners);
    }


}
