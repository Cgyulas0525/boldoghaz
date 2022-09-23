<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStructuresRequest;
use App\Http\Requests\UpdateStructuresRequest;
use App\Repositories\StructuresRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Structures;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class StructuresController extends AppBaseController
{
    /** @var StructuresRepository $structuresRepository*/
    private $structuresRepository;

    public function __construct(StructuresRepository $structuresRepo)
    {
        $this->structuresRepository = $structuresRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('structures.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Structures', $row["id"], 'structures']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Structures.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->structuresRepository->all();
                return $this->dwData($data);

            }

            return view('structures.index');
        }
    }

    /**
     * Show the form for creating a new Structures.
     *
     * @return Response
     */
    public function create()
    {
        return view('structures.create');
    }

    /**
     * Store a newly created Structures in storage.
     *
     * @param CreateStructuresRequest $request
     *
     * @return Response
     */
    public function store(CreateStructuresRequest $request)
    {
        $input = $request->all();

        $structures = $this->structuresRepository->create($input);

        return view('structures.create');
    }

    /**
     * Display the specified Structures.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $structures = $this->structuresRepository->find($id);

        if (empty($structures)) {
            return redirect(route('structures.index'));
        }

        return view('structures.show')->with('structures', $structures);
    }

    /**
     * Show the form for editing the specified Structures.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $structures = $this->structuresRepository->find($id);

        if (empty($structures)) {
            return redirect(route('structures.index'));
        }

        return view('structures.edit')->with('structures', $structures);
    }

    /**
     * Update the specified Structures in storage.
     *
     * @param int $id
     * @param UpdateStructuresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStructuresRequest $request)
    {
        $structures = $this->structuresRepository->find($id);

        if (empty($structures)) {
            return redirect(route('structures.index'));
        }

        $structures = $this->structuresRepository->update($request->all(), $id);

        return redirect(route('structures.index'));
    }

    /**
     * Remove the specified Structures from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $structures = $this->structuresRepository->find($id);

        if (empty($structures)) {
            return redirect(route('structures.index'));
        }

        $this->structuresRepository->delete($id);

        return redirect(route('structures.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + Structures::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



