<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHousetypesRequest;
use App\Http\Requests\UpdateHousetypesRequest;
use App\Repositories\HousetypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Housetypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class HousetypesController extends AppBaseController
{
    /** @var HousetypesRepository $housetypesRepository*/
    private $housetypesRepository;

    public function __construct(HousetypesRepository $housetypesRepo)
    {
        $this->housetypesRepository = $housetypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('housetypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Housetypes', $row["id"], 'housetypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Housetypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->housetypesRepository->all();
                return $this->dwData($data);

            }

            return view('housetypes.index');
        }
    }

    /**
     * Show the form for creating a new Housetypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('housetypes.create');
    }

    /**
     * Store a newly created Housetypes in storage.
     *
     * @param CreateHousetypesRequest $request
     *
     * @return Response
     */
    public function store(CreateHousetypesRequest $request)
    {
        $input = $request->all();

        $housetypes = $this->housetypesRepository->create($input);

        return redirect(route('housetypes.index'));
    }

    /**
     * Display the specified Housetypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $housetypes = $this->housetypesRepository->find($id);

        if (empty($housetypes)) {
            return redirect(route('housetypes.index'));
        }

        return view('housetypes.show')->with('housetypes', $housetypes);
    }

    /**
     * Show the form for editing the specified Housetypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $housetypes = $this->housetypesRepository->find($id);

        if (empty($housetypes)) {
            return redirect(route('housetypes.index'));
        }

        return view('housetypes.edit')->with('housetypes', $housetypes);
    }

    /**
     * Update the specified Housetypes in storage.
     *
     * @param int $id
     * @param UpdateHousetypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHousetypesRequest $request)
    {
        $housetypes = $this->housetypesRepository->find($id);

        if (empty($housetypes)) {
            return redirect(route('housetypes.index'));
        }

        $housetypes = $this->housetypesRepository->update($request->all(), $id);

        return redirect(route('housetypes.index'));
    }

    /**
     * Remove the specified Housetypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $housetypes = $this->housetypesRepository->find($id);

        if (empty($housetypes)) {
            return redirect(route('housetypes.index'));
        }

        $this->housetypesRepository->delete($id);

        return redirect(route('housetypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + housetypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



