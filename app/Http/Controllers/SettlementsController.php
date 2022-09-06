<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSettlementsRequest;
use App\Http\Requests\UpdateSettlementsRequest;
use App\Repositories\SettlementsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Settlements;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class SettlementsController extends AppBaseController
{
    /** @var SettlementsRepository $settlementsRepository*/
    private $settlementsRepository;

    public function __construct(SettlementsRepository $settlementsRepo)
    {
        $this->settlementsRepository = $settlementsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('settlements.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('settlements.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Settlements.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

//                $data = $this->settlementsRepository->all();
                $data = DB::table('settlements')->orderBy('postalcode', 'asc')->orderBy('settlement', 'asc')->get();
                return $this->dwData($data);

            }

            return view('settlements.index');
        }
    }

    /**
     * Show the form for creating a new Settlements.
     *
     * @return Response
     */
    public function create()
    {
        return view('settlements.create');
    }

    /**
     * Store a newly created Settlements in storage.
     *
     * @param CreateSettlementsRequest $request
     *
     * @return Response
     */
    public function store(CreateSettlementsRequest $request)
    {
        $input = $request->all();

        $settlements = $this->settlementsRepository->create($input);

        return redirect(route('settlements.index'));
    }

    /**
     * Display the specified Settlements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $settlements = $this->settlementsRepository->find($id);

        if (empty($settlements)) {
            return redirect(route('settlements.index'));
        }

        return view('settlements.show')->with('settlements', $settlements);
    }

    /**
     * Show the form for editing the specified Settlements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $settlements = $this->settlementsRepository->find($id);

        if (empty($settlements)) {
            return redirect(route('settlements.index'));
        }

        return view('settlements.edit')->with('settlements', $settlements);
    }

    /**
     * Update the specified Settlements in storage.
     *
     * @param int $id
     * @param UpdateSettlementsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSettlementsRequest $request)
    {
        $settlements = $this->settlementsRepository->find($id);

        if (empty($settlements)) {
            return redirect(route('settlements.index'));
        }

        $settlements = $this->settlementsRepository->update($request->all(), $id);

        return redirect(route('settlements.index'));
    }

    /**
     * Remove the specified Settlements from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $settlements = $this->settlementsRepository->find($id);

        if (empty($settlements)) {
            return redirect(route('settlements.index'));
        }

        $this->settlementsRepository->delete($id);

        return redirect(route('settlements.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + settlements::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



