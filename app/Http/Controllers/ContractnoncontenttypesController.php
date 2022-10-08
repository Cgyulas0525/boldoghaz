<?php

namespace App\Http\Controllers;

use App\Classes\Utility\utilityClass;
use App\Http\Requests\CreateContractnoncontenttypesRequest;
use App\Http\Requests\UpdateContractnoncontenttypesRequest;
use App\Repositories\ContractnoncontenttypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Contractnoncontenttypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class ContractnoncontenttypesController extends AppBaseController
{
    /** @var ContractnoncontenttypesRepository $contractnoncontenttypesRepository*/
    private $contractnoncontenttypesRepository;

    public function __construct(ContractnoncontenttypesRepository $contractnoncontenttypesRepo)
    {
        $this->contractnoncontenttypesRepository = $contractnoncontenttypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('typeName', function($data) { return $data->typeName; })
            ->addColumn('action', function($row){
                if (!utilityClass::protectedRecord('contractnoncontenttypes', $row->id)) {
                    $btn = '<a href="' . route('contractnoncontenttypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                    $btn = $btn . '<a href="' . route('contractnoncontenttypes.destroy', [$row->id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                    return $btn;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Contractnoncontenttypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->contractnoncontenttypesRepository->all();
                return $this->dwData($data);

            }

            return view('contractnoncontenttypes.index');
        }
    }

    /**
     * Show the form for creating a new Contractnoncontenttypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('contractnoncontenttypes.create');
    }

    /**
     * Store a newly created Contractnoncontenttypes in storage.
     *
     * @param CreateContractnoncontenttypesRequest $request
     *
     * @return Response
     */
    public function store(CreateContractnoncontenttypesRequest $request)
    {
        $input = $request->all();

        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->create($input);

        return redirect(route('contractnoncontenttypes.index'));
    }

    /**
     * Display the specified Contractnoncontenttypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->find($id);

        if (empty($contractnoncontenttypes)) {
            return redirect(route('contractnoncontenttypes.index'));
        }

        return view('contractnoncontenttypes.show')->with('contractnoncontenttypes', $contractnoncontenttypes);
    }

    /**
     * Show the form for editing the specified Contractnoncontenttypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->find($id);

        if (empty($contractnoncontenttypes)) {
            return redirect(route('contractnoncontenttypes.index'));
        }

        return view('contractnoncontenttypes.edit')->with('contractnoncontenttypes', $contractnoncontenttypes);
    }

    /**
     * Update the specified Contractnoncontenttypes in storage.
     *
     * @param int $id
     * @param UpdateContractnoncontenttypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractnoncontenttypesRequest $request)
    {
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->find($id);

        if (empty($contractnoncontenttypes)) {
            return redirect(route('contractnoncontenttypes.index'));
        }

        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->update($request->all(), $id);

        return redirect(route('contractnoncontenttypes.index'));
    }

    /**
     * Remove the specified Contractnoncontenttypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->find($id);

        if (empty($contractnoncontenttypes)) {
            return redirect(route('contractnoncontenttypes.index'));
        }

        $this->contractnoncontenttypesRepository->delete($id);

        return redirect(route('contractnoncontenttypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + contractnoncontenttypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



