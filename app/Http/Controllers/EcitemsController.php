<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEcitemsRequest;
use App\Http\Requests\UpdateEcitemsRequest;
use App\Repositories\EcitemsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Ecitems;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class EcitemsController extends AppBaseController
{
    /** @var EcitemsRepository $ecitemsRepository*/
    private $ecitemsRepository;

    public function __construct(EcitemsRepository $ecitemsRepo)
    {
        $this->ecitemsRepository = $ecitemsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('ecitems.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('ecitems.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Ecitems.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->ecitemsRepository->all();
                return $this->dwData($data);

            }

            return view('ecitems.index');
        }
    }

    /**
     * Show the form for creating a new Ecitems.
     *
     * @return Response
     */
    public function create()
    {
        return view('ecitems.create');
    }

    /**
     * Store a newly created Ecitems in storage.
     *
     * @param CreateEcitemsRequest $request
     *
     * @return Response
     */
    public function store(CreateEcitemsRequest $request)
    {
        $input = $request->all();

        $ecitems = $this->ecitemsRepository->create($input);

        return redirect(route('ecitems.index'));
    }

    /**
     * Display the specified Ecitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ecitems = $this->ecitemsRepository->find($id);

        if (empty($ecitems)) {
            return redirect(route('ecitems.index'));
        }

        return view('ecitems.show')->with('ecitems', $ecitems);
    }

    /**
     * Show the form for editing the specified Ecitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ecitems = $this->ecitemsRepository->find($id);

        if (empty($ecitems)) {
            return redirect(route('ecitems.index'));
        }

        return view('ecitems.edit')->with('ecitems', $ecitems);
    }

    /**
     * Update the specified Ecitems in storage.
     *
     * @param int $id
     * @param UpdateEcitemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEcitemsRequest $request)
    {
        $ecitems = $this->ecitemsRepository->find($id);

        if (empty($ecitems)) {
            return redirect(route('ecitems.index'));
        }

        $ecitems = $this->ecitemsRepository->update($request->all(), $id);

        return redirect(route('ecitems.index'));
    }

    /**
     * Remove the specified Ecitems from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ecitems = $this->ecitemsRepository->find($id);

        if (empty($ecitems)) {
            return redirect(route('ecitems.index'));
        }

        $this->ecitemsRepository->delete($id);

        return redirect(route('ecitems.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + ecitems::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



