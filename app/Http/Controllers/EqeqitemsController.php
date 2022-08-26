<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEqeqitemsRequest;
use App\Http\Requests\UpdateEqeqitemsRequest;
use App\Repositories\EqeqitemsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Eqeqitems;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class EqeqitemsController extends AppBaseController
{
    /** @var EqeqitemsRepository $eqeqitemsRepository*/
    private $eqeqitemsRepository;

    public function __construct(EqeqitemsRepository $eqeqitemsRepo)
    {
        $this->eqeqitemsRepository = $eqeqitemsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('eqName', function($data) { return $data->eqName; })
            ->addColumn('eqItemName', function($data) { return $data->eqItemName; })
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('eqeqitems.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
//                $btn = $btn.'<a href="' . route('eqeqitems.destroy', [$row->id]) . '"
//                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Eqeqitems.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->eqeqitemsRepository->all();
                return $this->dwData($data);

            }

            return view('eqeqitems.index');
        }
    }

    public function indexEQ(Request $request, $id)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = Eqeqitems::where('equipmenttypes_id', $id)->orderBy('eqitems_id', 'asc')->get();
                return $this->dwData($data);

            }

            return view('eqeqitems.index');
        }
    }


    /**
     * Show the form for creating a new Eqeqitems.
     *
     * @return Response
     */
    public function create()
    {
        return view('eqeqitems.create');
    }

    /**
     * Store a newly created Eqeqitems in storage.
     *
     * @param CreateEqeqitemsRequest $request
     *
     * @return Response
     */
    public function store(CreateEqeqitemsRequest $request)
    {
        $input = $request->all();

        $eqeqitems = $this->eqeqitemsRepository->create($input);

        return redirect(route('eqeqitems.index'));
    }

    /**
     * Display the specified Eqeqitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eqeqitems = $this->eqeqitemsRepository->find($id);

        if (empty($eqeqitems)) {
            return redirect(route('eqeqitems.index'));
        }

        return view('eqeqitems.show')->with('eqeqitems', $eqeqitems);
    }

    /**
     * Show the form for editing the specified Eqeqitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eqeqitems = $this->eqeqitemsRepository->find($id);

        if (empty($eqeqitems)) {
            return redirect(route('eqeqitems.index'));
        }

        return view('eqeqitems.edit')->with('eqeqitems', $eqeqitems);
    }

    /**
     * Update the specified Eqeqitems in storage.
     *
     * @param int $id
     * @param UpdateEqeqitemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEqeqitemsRequest $request)
    {
        $eqeqitems = $this->eqeqitemsRepository->find($id);

        if (empty($eqeqitems)) {
            return redirect(route('eqeqitems.index'));
        }

        $eqeqitems = $this->eqeqitemsRepository->update($request->all(), $id);

        return redirect(route('equipmenttypes.edit', $eqeqitems->equipmenttypes_id ));
    }

    /**
     * Remove the specified Eqeqitems from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eqeqitems = $this->eqeqitemsRepository->find($id);

        if (empty($eqeqitems)) {
            return redirect(route('eqeqitems.index'));
        }

        $this->eqeqitemsRepository->delete($id);

        return redirect(route('eqeqitems.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + eqeqitems::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



