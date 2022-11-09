<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartnertypesRequest;
use App\Http\Requests\UpdatePartnertypesRequest;
use App\Repositories\PartnertypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Partnertypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class PartnertypeChildController extends Controller
{
    private $partnertypesRepository;

    public function __construct(PartnertypesRepository $partnertypesRepo)
    {
        $this->partnertypesRepository = $partnertypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('partnertypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                if ($row->id > 1) {
                    $btn = $btn.'<a href="' . route('partnertypes.destroy', [$row->id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Display a listing of the Partnertypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function ptindex(Request $request, $id)
    {
        if( Auth::check() ){
            if ($request->ajax()) {
                $data = Partnertypes::where('parent_id', $id)->get();
                return $this->dwData($data);
            }
            return view('partnertypes.index');
        }
    }

    /**
     * Show the form for creating a new Partnertypes.
     *
     * @return Response
     */
    public function ptcreateChild($id)
    {
        $partnertypes = $this->partnertypesRepository->find($id);

        return view('partnertypes.ptc_create')->with('partnertypes', $partnertypes);
    }

    /**
     * Store a newly created Partnertypes in storage.
     *
     * @param CreatePartnertypesRequest $request
     *
     * @return Response
     */
    public function ptstore(CreatePartnertypesRequest $request)
    {
        $input = $request->all();

        $partnertypes = $this->partnertypesRepository->create($input);
        $partnertypes = Partnertypes::find($partnertypes->parent_id);

        return view('partnertypes.edit')->with('partnertypes', $partnertypes);

    }

}
