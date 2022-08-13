<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTablesRequest;
use App\Http\Requests\UpdateTablesRequest;
use App\Repositories\TablesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use App\Models\Tables;

class TablesController extends AppBaseController
{
    /** @var TablesRepository $tablesRepository*/
    private $tablesRepository;

    public function __construct(TablesRepository $tablesRepo)
    {
        $this->tablesRepository = $tablesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('tables.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('tables.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Tables.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->tablesRepository->all();
                return $this->dwData($data);

            }

            return view('tables.index');
        }
    }

    /**
     * Show the form for creating a new Tables.
     *
     * @return Response
     */
    public function create()
    {
        return view('tables.create');
    }

    /**
     * Store a newly created Tables in storage.
     *
     * @param CreateTablesRequest $request
     *
     * @return Response
     */
    public function store(CreateTablesRequest $request)
    {
        $input = $request->all();

        $tables = $this->tablesRepository->create($input);

        return redirect(route('tables.index'));
    }

    /**
     * Display the specified Tables.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tables = $this->tablesRepository->find($id);

        if (empty($tables)) {
            return redirect(route('tables.index'));
        }

        return view('tables.show')->with('tables', $tables);
    }

    /**
     * Show the form for editing the specified Tables.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tables = $this->tablesRepository->find($id);

        if (empty($tables)) {
            return redirect(route('tables.index'));
        }

        return view('tables.edit')->with('tables', $tables);
    }

    /**
     * Update the specified Tables in storage.
     *
     * @param int $id
     * @param UpdateTablesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTablesRequest $request)
    {
        $tables = $this->tablesRepository->find($id);

        if (empty($tables)) {
            return redirect(route('tables.index'));
        }

        $tables = $this->tablesRepository->update($request->all(), $id);

        return redirect(route('tables.index'));
    }

    /**
     * Remove the specified Tables from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tables = $this->tablesRepository->find($id);

        if (empty($tables)) {
            return redirect(route('tables.index'));
        }

        $this->tablesRepository->delete($id);

        return redirect(route('tables.index'));
    }

    /*
     * Tables dropdown for field select
     *
     * return array
     */
    public static function tablesDDW() : array
    {
        return [" "] + Tables::orderBy('name')->pluck('name', 'id')->toArray();
    }

}
