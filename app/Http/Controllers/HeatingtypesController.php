<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHeatingtypesRequest;
use App\Http\Requests\UpdateHeatingtypesRequest;
use App\Models\Heatingtypes;
use App\Repositories\HeatingtypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class HeatingtypesController extends AppBaseController
{
    /** @var HeatingtypesRepository $heatingtypesRepository*/
    private $heatingtypesRepository;

    public function __construct(HeatingtypesRepository $heatingtypesRepo)
    {
        $this->heatingtypesRepository = $heatingtypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('heatingtypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('heatingtypes.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Heatingtypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->heatingtypesRepository->all();
                return $this->dwData($data);

            }

            return view('heatingtypes.index');
        }
    }

    /**
     * Show the form for creating a new Heatingtypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('heatingtypes.create');
    }

    /**
     * Store a newly created Heatingtypes in storage.
     *
     * @param CreateHeatingtypesRequest $request
     *
     * @return Response
     */
    public function store(CreateHeatingtypesRequest $request)
    {
        $input = $request->all();

        $heatingtypes = $this->heatingtypesRepository->create($input);

        return redirect(route('heatingtypes.index'));
    }

    /**
     * Display the specified Heatingtypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $heatingtypes = $this->heatingtypesRepository->find($id);

        if (empty($heatingtypes)) {
            return redirect(route('heatingtypes.index'));
        }

        return view('heatingtypes.show')->with('heatingtypes', $heatingtypes);
    }

    /**
     * Show the form for editing the specified Heatingtypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $heatingtypes = $this->heatingtypesRepository->find($id);

        if (empty($heatingtypes)) {
            return redirect(route('heatingtypes.index'));
        }

        return view('heatingtypes.edit')->with('heatingtypes', $heatingtypes);
    }

    /**
     * Update the specified Heatingtypes in storage.
     *
     * @param int $id
     * @param UpdateHeatingtypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHeatingtypesRequest $request)
    {
        $heatingtypes = $this->heatingtypesRepository->find($id);

        if (empty($heatingtypes)) {
            return redirect(route('heatingtypes.index'));
        }

        $heatingtypes = $this->heatingtypesRepository->update($request->all(), $id);

        return redirect(route('heatingtypes.index'));
    }

    /**
     * Remove the specified Heatingtypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $heatingtypes = $this->heatingtypesRepository->find($id);

        if (empty($heatingtypes)) {
            return redirect(route('heatingtypes.index'));
        }

        $this->heatingtypesRepository->delete($id);

        return redirect(route('heatingtypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + Heatingtypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



