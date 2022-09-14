<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartnerspartnertypesRequest;
use App\Http\Requests\UpdatePartnerspartnertypesRequest;
use App\Models\Partners;
use App\Repositories\PartnerspartnertypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Partnerspartnertypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class PartnerspartnertypesController extends AppBaseController
{
    /** @var PartnerspartnertypesRepository $partnerspartnertypesRepository*/
    private $partnerspartnertypesRepository;

    public function __construct(PartnerspartnertypesRepository $partnerspartnertypesRepo)
    {
        $this->partnerspartnertypesRepository = $partnerspartnertypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
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


    /**
     * Display a listing of the Partnerspartnertypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->partnerspartnertypesRepository->all();
                return $this->dwData($data);

            }

            return view('partnerspartnertypes.index');
        }
    }

    /**
     * Show the form for creating a new Partnerspartnertypes.
     *
     * @return Response
     */
    public function create($parentId)
    {
        return view('partnerspartnertypes.create')->with('parentId', $parentId);
    }

    /**
     * Store a newly created Partnerspartnertypes in storage.
     *
     * @param CreatePartnerspartnertypesRequest $request
     *
     * @return Response
     */
    public function store(CreatePartnerspartnertypesRequest $request)
    {
        $input = $request->all();

        $partnerspartnertypes = $this->partnerspartnertypesRepository->create($input);
        $partners = Partners::find($partnerspartnertypes->partner_id);

        return view('partners.edit')->with('partners', $partners);
    }

    /**
     * Display the specified Partnerspartnertypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partnerspartnertypes = $this->partnerspartnertypesRepository->find($id);

        if (empty($partnerspartnertypes)) {
            return redirect(route('partnerspartnertypes.index'));
        }

        return view('partnerspartnertypes.show')->with('partnerspartnertypes', $partnerspartnertypes);
    }

    /**
     * Show the form for editing the specified Partnerspartnertypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partnerspartnertypes = $this->partnerspartnertypesRepository->find($id);

        if (empty($partnerspartnertypes)) {
            return redirect(route('partnerspartnertypes.index'));
        }

        return view('partnerspartnertypes.edit')->with('partnerspartnertypes', $partnerspartnertypes);
    }

    /**
     * Update the specified Partnerspartnertypes in storage.
     *
     * @param int $id
     * @param UpdatePartnerspartnertypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartnerspartnertypesRequest $request)
    {
        $partnerspartnertypes = $this->partnerspartnertypesRepository->find($id);

        if (empty($partnerspartnertypes)) {
            return redirect(route('partnerspartnertypes.index'));
        }

        $partnerspartnertypes = $this->partnerspartnertypesRepository->update($request->all(), $id);
        $partners = Partners::find($partnerspartnertypes->partner_id);

        return view('partners.edit')->with('partners', $partners);
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
    public function destroy($id)
    {
        $partnerspartnertypes = $this->partnerspartnertypesRepository->find($id);

        if (empty($partnerspartnertypes)) {
            return redirect(route('partnerspartnertypes.index'));
        }

        $this->partnerspartnertypesRepository->delete($id);

        return redirect(route('partnerspartnertypes.index'));
    }

    /*
     * Dropdown for field select
     *
     * return array
     */
    public static function DDDW() : array
    {
        return [" "] + partnerspartnertypes::orderBy('name')->pluck('name', 'id')->toArray();
    }
}



