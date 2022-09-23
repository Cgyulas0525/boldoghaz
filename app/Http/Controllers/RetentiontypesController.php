<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRetentiontypesRequest;
use App\Http\Requests\UpdateRetentiontypesRequest;
use App\Repositories\RetentiontypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Retentiontypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class RetentiontypesController extends AppBaseController
{
    /** @var RetentiontypesRepository $retentiontypesRepository*/
    private $retentiontypesRepository;

    public function __construct(RetentiontypesRepository $retentiontypesRepo)
    {
        $this->retentiontypesRepository = $retentiontypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('retentiontypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Retentiontypes', $row["id"], 'retentiontypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Retentiontypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->retentiontypesRepository->all();
                return $this->dwData($data);

            }

            return view('retentiontypes.index');
        }
    }

    /**
     * Show the form for creating a new Retentiontypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('retentiontypes.create');
    }

    /**
     * Store a newly created Retentiontypes in storage.
     *
     * @param CreateRetentiontypesRequest $request
     *
     * @return Response
     */
    public function store(CreateRetentiontypesRequest $request)
    {
        $input = $request->all();

        $retentiontypes = $this->retentiontypesRepository->create($input);

        return redirect(route('retentiontypes.index'));
    }

    /**
     * Display the specified Retentiontypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $retentiontypes = $this->retentiontypesRepository->find($id);

        if (empty($retentiontypes)) {
            return redirect(route('retentiontypes.index'));
        }

        return view('retentiontypes.show')->with('retentiontypes', $retentiontypes);
    }

    /**
     * Show the form for editing the specified Retentiontypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $retentiontypes = $this->retentiontypesRepository->find($id);

        if (empty($retentiontypes)) {
            return redirect(route('retentiontypes.index'));
        }

        return view('retentiontypes.edit')->with('retentiontypes', $retentiontypes);
    }

    /**
     * Update the specified Retentiontypes in storage.
     *
     * @param int $id
     * @param UpdateRetentiontypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRetentiontypesRequest $request)
    {
        $retentiontypes = $this->retentiontypesRepository->find($id);

        if (empty($retentiontypes)) {
            return redirect(route('retentiontypes.index'));
        }

        $retentiontypes = $this->retentiontypesRepository->update($request->all(), $id);

        return redirect(route('retentiontypes.index'));
    }

    /**
     * Remove the specified Retentiontypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $retentiontypes = $this->retentiontypesRepository->find($id);

        if (empty($retentiontypes)) {
            return redirect(route('retentiontypes.index'));
        }

        $this->retentiontypesRepository->delete($id);

        return redirect(route('retentiontypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + retentiontypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



