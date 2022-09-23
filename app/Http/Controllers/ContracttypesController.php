<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContracttypesRequest;
use App\Http\Requests\UpdateContracttypesRequest;
use App\Repositories\ContracttypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Contracttypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class ContracttypesController extends AppBaseController
{
    /** @var ContracttypesRepository $contracttypesRepository*/
    private $contracttypesRepository;

    public function __construct(ContracttypesRepository $contracttypesRepo)
    {
        $this->contracttypesRepository = $contracttypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('contracttypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Contracttypes', $row["id"], 'contracttypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Contracttypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->contracttypesRepository->all();
                return $this->dwData($data);

            }

            return view('contracttypes.index');
        }
    }

    /**
     * Show the form for creating a new Contracttypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('contracttypes.create');
    }

    /**
     * Store a newly created Contracttypes in storage.
     *
     * @param CreateContracttypesRequest $request
     *
     * @return Response
     */
    public function store(CreateContracttypesRequest $request)
    {
        $input = $request->all();

        $contracttypes = $this->contracttypesRepository->create($input);

        return redirect(route('contracttypes.index'));
    }

    /**
     * Display the specified Contracttypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contracttypes = $this->contracttypesRepository->find($id);

        if (empty($contracttypes)) {
            return redirect(route('contracttypes.index'));
        }

        return view('contracttypes.show')->with('contracttypes', $contracttypes);
    }

    /**
     * Show the form for editing the specified Contracttypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contracttypes = $this->contracttypesRepository->find($id);

        if (empty($contracttypes)) {
            return redirect(route('contracttypes.index'));
        }

        return view('contracttypes.edit')->with('contracttypes', $contracttypes);
    }

    /**
     * Update the specified Contracttypes in storage.
     *
     * @param int $id
     * @param UpdateContracttypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContracttypesRequest $request)
    {
        $contracttypes = $this->contracttypesRepository->find($id);

        if (empty($contracttypes)) {
            return redirect(route('contracttypes.index'));
        }

        $contracttypes = $this->contracttypesRepository->update($request->all(), $id);

        return redirect(route('contracttypes.index'));
    }

    /**
     * Remove the specified Contracttypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contracttypes = $this->contracttypesRepository->find($id);

        if (empty($contracttypes)) {
            return redirect(route('contracttypes.index'));
        }

        $this->contracttypesRepository->delete($id);

        return redirect(route('contracttypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + contracttypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



