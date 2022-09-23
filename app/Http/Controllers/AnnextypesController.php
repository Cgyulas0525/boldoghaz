<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnnextypesRequest;
use App\Http\Requests\UpdateAnnextypesRequest;
use App\Repositories\AnnextypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Annextypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class AnnextypesController extends AppBaseController
{
    /** @var AnnextypesRepository $annextypesRepository*/
    private $annextypesRepository;

    public function __construct(AnnextypesRepository $annextypesRepo)
    {
        $this->annextypesRepository = $annextypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('annextypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Annextypes', $row["id"], 'annextypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Annextypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->annextypesRepository->all();
                return $this->dwData($data);

            }

            return view('annextypes.index');
        }
    }

    /**
     * Show the form for creating a new Annextypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('annextypes.create');
    }

    /**
     * Store a newly created Annextypes in storage.
     *
     * @param CreateAnnextypesRequest $request
     *
     * @return Response
     */
    public function store(CreateAnnextypesRequest $request)
    {
        $input = $request->all();

        $annextypes = $this->annextypesRepository->create($input);

        return redirect(route('annextypes.index'));
    }

    /**
     * Display the specified Annextypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $annextypes = $this->annextypesRepository->find($id);

        if (empty($annextypes)) {
            return redirect(route('annextypes.index'));
        }

        return view('annextypes.show')->with('annextypes', $annextypes);
    }

    /**
     * Show the form for editing the specified Annextypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $annextypes = $this->annextypesRepository->find($id);

        if (empty($annextypes)) {
            return redirect(route('annextypes.index'));
        }

        return view('annextypes.edit')->with('annextypes', $annextypes);
    }

    /**
     * Update the specified Annextypes in storage.
     *
     * @param int $id
     * @param UpdateAnnextypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnnextypesRequest $request)
    {
        $annextypes = $this->annextypesRepository->find($id);

        if (empty($annextypes)) {
            return redirect(route('annextypes.index'));
        }

        $annextypes = $this->annextypesRepository->update($request->all(), $id);

        return redirect(route('annextypes.index'));
    }

    /**
     * Remove the specified Annextypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $annextypes = $this->annextypesRepository->find($id);

        if (empty($annextypes)) {
            return redirect(route('annextypes.index'));
        }

        $this->annextypesRepository->delete($id);

        return redirect(route('annextypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + annextypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



