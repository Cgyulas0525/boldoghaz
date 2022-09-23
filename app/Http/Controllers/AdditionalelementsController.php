<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdditionalelementsRequest;
use App\Http\Requests\UpdateAdditionalelementsRequest;
use App\Repositories\AdditionalelementsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Additionalelements;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class AdditionalelementsController extends AppBaseController
{
    /** @var AdditionalelementsRepository $additionalelementsRepository*/
    private $additionalelementsRepository;

    public function __construct(AdditionalelementsRepository $additionalelementsRepo)
    {
        $this->additionalelementsRepository = $additionalelementsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('additionalelements.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Additionalelements', $row["id"], 'additionalelements']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Additionalelements.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->additionalelementsRepository->all();
                return $this->dwData($data);

            }

            return view('additionalelements.index');
        }
    }

    /**
     * Show the form for creating a new Additionalelements.
     *
     * @return Response
     */
    public function create()
    {
        return view('additionalelements.create');
    }

    /**
     * Store a newly created Additionalelements in storage.
     *
     * @param CreateAdditionalelementsRequest $request
     *
     * @return Response
     */
    public function store(CreateAdditionalelementsRequest $request)
    {
        $input = $request->all();

        $additionalelements = $this->additionalelementsRepository->create($input);

        return view('additionalelements.create');
    }

    /**
     * Display the specified Additionalelements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $additionalelements = $this->additionalelementsRepository->find($id);

        if (empty($additionalelements)) {
            return redirect(route('additionalelements.index'));
        }

        return view('additionalelements.show')->with('additionalelements', $additionalelements);
    }

    /**
     * Show the form for editing the specified Additionalelements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $additionalelements = $this->additionalelementsRepository->find($id);

        if (empty($additionalelements)) {
            return redirect(route('additionalelements.index'));
        }

        return view('additionalelements.edit')->with('additionalelements', $additionalelements);
    }

    /**
     * Update the specified Additionalelements in storage.
     *
     * @param int $id
     * @param UpdateAdditionalelementsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdditionalelementsRequest $request)
    {
        $additionalelements = $this->additionalelementsRepository->find($id);

        if (empty($additionalelements)) {
            return redirect(route('additionalelements.index'));
        }

        $additionalelements = $this->additionalelementsRepository->update($request->all(), $id);

        return redirect(route('additionalelements.index'));
    }

    /**
     * Remove the specified Additionalelements from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $additionalelements = $this->additionalelementsRepository->find($id);

        if (empty($additionalelements)) {
            return redirect(route('additionalelements.index'));
        }

        $this->additionalelementsRepository->delete($id);

        return redirect(route('additionalelements.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + additionalelements::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



