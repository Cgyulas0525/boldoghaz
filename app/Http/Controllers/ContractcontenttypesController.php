<?php

namespace App\Http\Controllers;

use App\Classes\Utility\utilityClass;
use App\Http\Requests\CreateContractcontenttypesRequest;
use App\Http\Requests\UpdateContractcontenttypesRequest;
use App\Repositories\ContractcontenttypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Contractcontenttypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class ContractcontenttypesController extends AppBaseController
{
    /** @var ContractcontenttypesRepository $contractcontenttypesRepository*/
    private $contractcontenttypesRepository;

    public function __construct(ContractcontenttypesRepository $contractcontenttypesRepo)
    {
        $this->contractcontenttypesRepository = $contractcontenttypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('typeName', function($data) { return $data->typeName; })
            ->addColumn('action', function($row){
                if (!utilityClass::protectedRecord('contractcontenttypes', $row->id)) {
                    $btn = '<a href="' . route('contractcontenttypes.edit', [$row->id]) . '"
                                 class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                    $btn = $btn.'<a href="' . route('contractcontenttypes.destroy', [$row->id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                    return $btn;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Contractcontenttypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->contractcontenttypesRepository->all();
                return $this->dwData($data);

            }

            return view('contractcontenttypes.index');
        }
    }

    /**
     * Show the form for creating a new Contractcontenttypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('contractcontenttypes.create');
    }

    /**
     * Store a newly created Contractcontenttypes in storage.
     *
     * @param CreateContractcontenttypesRequest $request
     *
     * @return Response
     */
    public function store(CreateContractcontenttypesRequest $request)
    {
        $input = $request->all();

        $contractcontenttypes = $this->contractcontenttypesRepository->create($input);

        return redirect(route('contractcontenttypes.index'));
    }

    /**
     * Display the specified Contractcontenttypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractcontenttypes = $this->contractcontenttypesRepository->find($id);

        if (empty($contractcontenttypes)) {
            return redirect(route('contractcontenttypes.index'));
        }

        return view('contractcontenttypes.show')->with('contractcontenttypes', $contractcontenttypes);
    }

    /**
     * Show the form for editing the specified Contractcontenttypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractcontenttypes = $this->contractcontenttypesRepository->find($id);

        if (empty($contractcontenttypes)) {
            return redirect(route('contractcontenttypes.index'));
        }

        return view('contractcontenttypes.edit')->with('contractcontenttypes', $contractcontenttypes);
    }

    /**
     * Update the specified Contractcontenttypes in storage.
     *
     * @param int $id
     * @param UpdateContractcontenttypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractcontenttypesRequest $request)
    {
        $contractcontenttypes = $this->contractcontenttypesRepository->find($id);

        if (empty($contractcontenttypes)) {
            return redirect(route('contractcontenttypes.index'));
        }

        $contractcontenttypes = $this->contractcontenttypesRepository->update($request->all(), $id);

        return redirect(route('contractcontenttypes.index'));
    }

    /**
     * Remove the specified Contractcontenttypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractcontenttypes = $this->contractcontenttypesRepository->find($id);

        if (empty($contractcontenttypes)) {
            return redirect(route('contractcontenttypes.index'));
        }

        $this->contractcontenttypesRepository->delete($id);

        return redirect(route('contractcontenttypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + contractcontenttypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



