<?php

namespace App\Http\Controllers;

use App\Classes\ptClass;
use App\Http\Requests\CreateConstructionphaseRequest;
use App\Http\Requests\UpdateConstructionphaseRequest;
use App\Repositories\ConstructionphaseRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Constructionphase;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class ConstructionphaseController extends AppBaseController
{
    /** @var ConstructionphaseRepository $constructionphaseRepository*/
    private $constructionphaseRepository;
    private $ptc;

    public function __construct(ConstructionphaseRepository $constructionphaseRepo)
    {
        $this->constructionphaseRepository = $constructionphaseRepo;
        $this->ptc = new ptClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('constructionphases.edit', [$row["id"]]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('constructionphases.destroy', [$row["id"]]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Constructionphase.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->ptc->selectData('Constructionphase');
                return $this->dwData($data);

            }

            return view('constructionphases.index');
        }
    }

    /**
     * Show the form for creating a new Constructionphase.
     *
     * @return Response
     */
    public function create()
    {
        return view('constructionphases.create');
    }

    /**
     * Store a newly created Constructionphase in storage.
     *
     * @param CreateConstructionphaseRequest $request
     *
     * @return Response
     */
    public function store(CreateConstructionphaseRequest $request)
    {
        $input = $request->all();

        $constructionphase = $this->constructionphaseRepository->create($input);

        return redirect(route('constructionphases.index'));
    }

    /**
     * Display the specified Constructionphase.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $constructionphase = $this->constructionphaseRepository->find($id);

        if (empty($constructionphase)) {
            return redirect(route('constructionphases.index'));
        }

        return view('constructionphases.show')->with('constructionphase', $constructionphase);
    }

    /**
     * Show the form for editing the specified Constructionphase.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $constructionphase = $this->constructionphaseRepository->find($id);

        if (empty($constructionphase)) {
            return redirect(route('constructionphases.index'));
        }

        return view('constructionphases.edit')->with('constructionphase', $constructionphase);
    }

    /**
     * Update the specified Constructionphase in storage.
     *
     * @param int $id
     * @param UpdateConstructionphaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConstructionphaseRequest $request)
    {
        $constructionphase = $this->constructionphaseRepository->find($id);

        if (empty($constructionphase)) {
            return redirect(route('constructionphases.index'));
        }

        $constructionphase = $this->constructionphaseRepository->update($request->all(), $id);

        return redirect(route('constructionphases.index'));
    }

    /**
     * Remove the specified Constructionphase from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $constructionphase = $this->constructionphaseRepository->find($id);

        if (empty($constructionphase)) {
            return redirect(route('constructionphases.index'));
        }

        $this->constructionphaseRepository->delete($id);

        return redirect(route('constructionphases.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + constructionphase::orderBy('name')->pluck('name', 'id')->toArray();
        }


    /**
     * Display a listing of the Constructionphase.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function childIndex(Request $request, $id)
    {
        if (Auth::check()) {

            if ($request->ajax()) {

                $data = Constructionphase::where('parent_id', $id)->get();
                return $this->dwData($data);

            }

            return view('constructionphases.index');
        }
    }

    /**
     * Show the form for creating a new Partnertypes.
     *
     * @return Response
     */
    public function createChild($id)
    {
        $constructionphase = $this->constructionphaseRepository->find($id);

        return view('constructionphases.cpc_create')->with('constructionphase', $constructionphase);
    }

    /**
     * Store a newly created Constructionphase in storage.
     *
     * @param CreateConstructionphaseRequest $request
     *
     * @return Response
     */
    public function childStore(CreateConstructionphaseRequest $request)
    {
        $input = $request->all();

        $constructionphase = $this->constructionphaseRepository->create($input);
        $constructionphase = Constructionphase::find($constructionphase->parent_id);

        return view('constructionphases.edit')->with('constructionphase', $constructionphase);

    }

}



