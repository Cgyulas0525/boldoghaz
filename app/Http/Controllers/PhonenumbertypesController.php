<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhonenumbertypesRequest;
use App\Http\Requests\UpdatePhonenumbertypesRequest;
use App\Models\Phonenumbertypes;
use App\Repositories\PhonenumbertypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class PhonenumbertypesController extends AppBaseController
{
    /** @var PhonenumbertypesRepository $phonenumbertypesRepository*/
    private $phonenumbertypesRepository;

    public function __construct(PhonenumbertypesRepository $phonenumbertypesRepo)
    {
        $this->phonenumbertypesRepository = $phonenumbertypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('phonenumbertypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('destroys', ['Phonenumbertypes', $row["id"], 'phonenumbertypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Phonenumbertypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->phonenumbertypesRepository->all();
                return $this->dwData($data);

            }

            return view('phonenumbertypes.index');
        }
    }

    /**
     * Show the form for creating a new Phonenumbertypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('phonenumbertypes.create');
    }

    /**
     * Store a newly created Phonenumbertypes in storage.
     *
     * @param CreatePhonenumbertypesRequest $request
     *
     * @return Response
     */
    public function store(CreatePhonenumbertypesRequest $request)
    {
        $input = $request->all();

        $phonenumbertypes = $this->phonenumbertypesRepository->create($input);

        return redirect(route('phonenumbertypes.index'));
    }

    /**
     * Display the specified Phonenumbertypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $phonenumbertypes = $this->phonenumbertypesRepository->find($id);

        if (empty($phonenumbertypes)) {
            return redirect(route('phonenumbertypes.index'));
        }

        return view('phonenumbertypes.show')->with('phonenumbertypes', $phonenumbertypes);
    }

    /**
     * Show the form for editing the specified Phonenumbertypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $phonenumbertypes = $this->phonenumbertypesRepository->find($id);

        if (empty($phonenumbertypes)) {
            return redirect(route('phonenumbertypes.index'));
        }

        return view('phonenumbertypes.edit')->with('phonenumbertypes', $phonenumbertypes);
    }

    /**
     * Update the specified Phonenumbertypes in storage.
     *
     * @param int $id
     * @param UpdatePhonenumbertypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhonenumbertypesRequest $request)
    {
        $phonenumbertypes = $this->phonenumbertypesRepository->find($id);

        if (empty($phonenumbertypes)) {
            return redirect(route('phonenumbertypes.index'));
        }

        $phonenumbertypes = $this->phonenumbertypesRepository->update($request->all(), $id);

        return redirect(route('phonenumbertypes.index'));
    }

    /**
     * Remove the specified Phonenumbertypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $phonenumbertypes = $this->phonenumbertypesRepository->find($id);

        if (empty($phonenumbertypes)) {
            return redirect(route('phonenumbertypes.index'));
        }

        $this->phonenumbertypesRepository->delete($id);

        return redirect(route('phonenumbertypes.index'));
    }

    /*
     * Dropdown for field select
     *
     * return array
     */
    public static function DDDW() : array
    {
        return [" "] + Phonenumbertypes::orderBy('name')->pluck('name', 'id')->toArray();
    }

}
