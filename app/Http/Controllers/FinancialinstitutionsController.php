<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFinancialinstitutionsRequest;
use App\Http\Requests\UpdateFinancialinstitutionsRequest;
use App\Repositories\FinancialinstitutionsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Financialinstitutions;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class FinancialinstitutionsController extends AppBaseController
{
    /** @var FinancialinstitutionsRepository $financialinstitutionsRepository*/
    private $financialinstitutionsRepository;

    public function __construct(FinancialinstitutionsRepository $financialinstitutionsRepo)
    {
        $this->financialinstitutionsRepository = $financialinstitutionsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('financialinstitutions.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Financialinstitutions', $row["id"], 'financialinstitutions']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Financialinstitutions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->financialinstitutionsRepository->all();
                return $this->dwData($data);

            }

            return view('financialinstitutions.index');
        }
    }

    /**
     * Show the form for creating a new Financialinstitutions.
     *
     * @return Response
     */
    public function create()
    {
        return view('financialinstitutions.create');
    }

    /**
     * Store a newly created Financialinstitutions in storage.
     *
     * @param CreateFinancialinstitutionsRequest $request
     *
     * @return Response
     */
    public function store(CreateFinancialinstitutionsRequest $request)
    {
        $input = $request->all();

        $financialinstitutions = $this->financialinstitutionsRepository->create($input);

        return redirect(route('financialinstitutions.index'));
    }

    /**
     * Display the specified Financialinstitutions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $financialinstitutions = $this->financialinstitutionsRepository->find($id);

        if (empty($financialinstitutions)) {
            return redirect(route('financialinstitutions.index'));
        }

        return view('financialinstitutions.show')->with('financialinstitutions', $financialinstitutions);
    }

    /**
     * Show the form for editing the specified Financialinstitutions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $financialinstitutions = $this->financialinstitutionsRepository->find($id);

        if (empty($financialinstitutions)) {
            return redirect(route('financialinstitutions.index'));
        }

        return view('financialinstitutions.edit')->with('financialinstitutions', $financialinstitutions);
    }

    /**
     * Update the specified Financialinstitutions in storage.
     *
     * @param int $id
     * @param UpdateFinancialinstitutionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFinancialinstitutionsRequest $request)
    {
        $financialinstitutions = $this->financialinstitutionsRepository->find($id);

        if (empty($financialinstitutions)) {
            return redirect(route('financialinstitutions.index'));
        }

        $financialinstitutions = $this->financialinstitutionsRepository->update($request->all(), $id);

        return redirect(route('financialinstitutions.index'));
    }

    /**
     * Remove the specified Financialinstitutions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $financialinstitutions = $this->financialinstitutionsRepository->find($id);

        if (empty($financialinstitutions)) {
            return redirect(route('financialinstitutions.index'));
        }

        $this->financialinstitutionsRepository->delete($id);

        return redirect(route('financialinstitutions.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + financialinstitutions::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



