<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVismaiortypesRequest;
use App\Http\Requests\UpdateVismaiortypesRequest;
use App\Repositories\VismaiortypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Vismaiortypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class VismaiortypesController extends AppBaseController
{
    /** @var VismaiortypesRepository $vismaiortypesRepository*/
    private $vismaiortypesRepository;

    public function __construct(VismaiortypesRepository $vismaiortypesRepo)
    {
        $this->vismaiortypesRepository = $vismaiortypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('vismaiortypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Vismaiortypes', $row["id"], 'vismaiortypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Vismaiortypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->vismaiortypesRepository->all();
                return $this->dwData($data);

            }

            return view('vismaiortypes.index');
        }
    }

    /**
     * Show the form for creating a new Vismaiortypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('vismaiortypes.create');
    }

    /**
     * Store a newly created Vismaiortypes in storage.
     *
     * @param CreateVismaiortypesRequest $request
     *
     * @return Response
     */
    public function store(CreateVismaiortypesRequest $request)
    {
        $input = $request->all();

        $vismaiortypes = $this->vismaiortypesRepository->create($input);

        return redirect(route('vismaiortypes.index'));
    }

    /**
     * Display the specified Vismaiortypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vismaiortypes = $this->vismaiortypesRepository->find($id);

        if (empty($vismaiortypes)) {
            return redirect(route('vismaiortypes.index'));
        }

        return view('vismaiortypes.show')->with('vismaiortypes', $vismaiortypes);
    }

    /**
     * Show the form for editing the specified Vismaiortypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vismaiortypes = $this->vismaiortypesRepository->find($id);

        if (empty($vismaiortypes)) {
            return redirect(route('vismaiortypes.index'));
        }

        return view('vismaiortypes.edit')->with('vismaiortypes', $vismaiortypes);
    }

    /**
     * Update the specified Vismaiortypes in storage.
     *
     * @param int $id
     * @param UpdateVismaiortypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVismaiortypesRequest $request)
    {
        $vismaiortypes = $this->vismaiortypesRepository->find($id);

        if (empty($vismaiortypes)) {
            return redirect(route('vismaiortypes.index'));
        }

        $vismaiortypes = $this->vismaiortypesRepository->update($request->all(), $id);

        return redirect(route('vismaiortypes.index'));
    }

    /**
     * Remove the specified Vismaiortypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vismaiortypes = $this->vismaiortypesRepository->find($id);

        if (empty($vismaiortypes)) {
            return redirect(route('vismaiortypes.index'));
        }

        $this->vismaiortypesRepository->delete($id);

        return redirect(route('vismaiortypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + vismaiortypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



