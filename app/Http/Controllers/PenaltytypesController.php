<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenaltytypesRequest;
use App\Http\Requests\UpdatePenaltytypesRequest;
use App\Repositories\PenaltytypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Penaltytypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class PenaltytypesController extends AppBaseController
{
    /** @var PenaltytypesRepository $penaltytypesRepository*/
    private $penaltytypesRepository;

    public function __construct(PenaltytypesRepository $penaltytypesRepo)
    {
        $this->penaltytypesRepository = $penaltytypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('penaltytypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('penaltytypes.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Penaltytypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->penaltytypesRepository->all();
                return $this->dwData($data);

            }

            return view('penaltytypes.index');
        }
    }

    /**
     * Show the form for creating a new Penaltytypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('penaltytypes.create');
    }

    /**
     * Store a newly created Penaltytypes in storage.
     *
     * @param CreatePenaltytypesRequest $request
     *
     * @return Response
     */
    public function store(CreatePenaltytypesRequest $request)
    {
        $input = $request->all();

        $penaltytypes = $this->penaltytypesRepository->create($input);

        return redirect(route('penaltytypes.index'));
    }

    /**
     * Display the specified Penaltytypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penaltytypes = $this->penaltytypesRepository->find($id);

        if (empty($penaltytypes)) {
            return redirect(route('penaltytypes.index'));
        }

        return view('penaltytypes.show')->with('penaltytypes', $penaltytypes);
    }

    /**
     * Show the form for editing the specified Penaltytypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penaltytypes = $this->penaltytypesRepository->find($id);

        if (empty($penaltytypes)) {
            return redirect(route('penaltytypes.index'));
        }

        return view('penaltytypes.edit')->with('penaltytypes', $penaltytypes);
    }

    /**
     * Update the specified Penaltytypes in storage.
     *
     * @param int $id
     * @param UpdatePenaltytypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenaltytypesRequest $request)
    {
        $penaltytypes = $this->penaltytypesRepository->find($id);

        if (empty($penaltytypes)) {
            return redirect(route('penaltytypes.index'));
        }

        $penaltytypes = $this->penaltytypesRepository->update($request->all(), $id);

        return redirect(route('penaltytypes.index'));
    }

    /**
     * Remove the specified Penaltytypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penaltytypes = $this->penaltytypesRepository->find($id);

        if (empty($penaltytypes)) {
            return redirect(route('penaltytypes.index'));
        }

        $this->penaltytypesRepository->delete($id);

        return redirect(route('penaltytypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + penaltytypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



