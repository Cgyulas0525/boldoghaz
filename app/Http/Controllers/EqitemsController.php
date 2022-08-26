<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEqitemsRequest;
use App\Http\Requests\UpdateEqitemsRequest;
use App\Repositories\EqitemsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Eqitems;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class EqitemsController extends AppBaseController
{
    /** @var EqitemsRepository $eqitemsRepository*/
    private $eqitemsRepository;

    public function __construct(EqitemsRepository $eqitemsRepo)
    {
        $this->eqitemsRepository = $eqitemsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('eqitems.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('eqitems.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Eqitems.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->eqitemsRepository->all();
                return $this->dwData($data);

            }

            return view('eqitems.index');
        }
    }

    /**
     * Show the form for creating a new Eqitems.
     *
     * @return Response
     */
    public function create()
    {
        return view('eqitems.create');
    }

    /**
     * Store a newly created Eqitems in storage.
     *
     * @param CreateEqitemsRequest $request
     *
     * @return Response
     */
    public function store(CreateEqitemsRequest $request)
    {
        $input = $request->all();

        $eqitems = $this->eqitemsRepository->create($input);

        return redirect(route('eqitems.index'));
    }

    /**
     * Display the specified Eqitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eqitems = $this->eqitemsRepository->find($id);

        if (empty($eqitems)) {
            return redirect(route('eqitems.index'));
        }

        return view('eqitems.show')->with('eqitems', $eqitems);
    }

    /**
     * Show the form for editing the specified Eqitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eqitems = $this->eqitemsRepository->find($id);

        if (empty($eqitems)) {
            return redirect(route('eqitems.index'));
        }

        return view('eqitems.edit')->with('eqitems', $eqitems);
    }

    /**
     * Update the specified Eqitems in storage.
     *
     * @param int $id
     * @param UpdateEqitemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEqitemsRequest $request)
    {
        $eqitems = $this->eqitemsRepository->find($id);

        if (empty($eqitems)) {
            return redirect(route('eqitems.index'));
        }

        $eqitems = $this->eqitemsRepository->update($request->all(), $id);

        return redirect(route('eqitems.index'));
    }

    /**
     * Remove the specified Eqitems from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eqitems = $this->eqitemsRepository->find($id);

        if (empty($eqitems)) {
            return redirect(route('eqitems.index'));
        }

        $this->eqitemsRepository->delete($id);

        return redirect(route('eqitems.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + eqitems::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



