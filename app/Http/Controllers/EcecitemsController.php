<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEcecitemsRequest;
use App\Http\Requests\UpdateEcecitemsRequest;
use App\Models\Ececitems;
use App\Models\Ecitems;
use App\Models\EnergyClassifications;
use App\Repositories\EcecitemsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

use Alert;

class EcecitemsController extends AppBaseController
{
    /** @var EcecitemsRepository $ececitemsRepository*/
    private $ececitemsRepository;

    public function __construct(EcecitemsRepository $ececitemsRepo)
    {
        $this->ececitemsRepository = $ececitemsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('ecName', function($data) { return $data->ecName; })
            ->addColumn('ecItemName', function($data) { return $data->ecItemName; })
            ->addColumn('heatingtypeName', function($data) { return $data->heatingtypeName; })
            ->addColumn('quantityName', function($data) { return $data->quantityName; })
            ->addColumn('action', function($row){
                $btn = '';
                $btn = '';
                if ( $row->ecitems_id == 1 || $row->ecitems_id == 3 || $row->ecitems_id == 8) {
                    $btn = '<a href="' . route('ececitems.edit', [$row->id]) . '"
                                 class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                }
                $btn = $btn.'<a href="' . route('ececitems.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Ececitems.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->ececitemsRepository->all();
                return $this->dwData($data);

            }

            return view('ececitems.index');
        }
    }

    public function indexEC(Request $request, $id)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = Ececitems::where('energyclassifications_id', $id)->orderBy('ecitems_id', 'asc')->get();
                return $this->dwData($data);

            }

            return view('ececitems.index');
        }
    }

    /**
     * Show the form for creating a new Ececitems.
     *
     * @return Response
     */
    public function create()
    {
        return view('ececitems.create');
    }

    /**
     * Show the form for creating a new Ececitems.
     *
     * @return Response
     */
    public function createEC($id)
    {
        if ( Ecitems::whereNotIn('id', function($query) use($id) {
                $query->from('ececitems')->select('ecitems_id')->where('energyclassifications_id', $id)->get();
            })->get()->count() == 0 ) {

            Alert::warning('Figyelem!', 'Minden energetikai besorolás elemet hozzá rendelt már a tételhez!')->autoClose(false);
            $energyClassifications = EnergyClassifications::find($id);
            return view('energy_classifications.edit')->with('energyClassifications', $energyClassifications);
        }
        $ec = EnergyClassifications::find($id);
        return view('ececitems.create')->with('ec', $ec);
    }

    /**
     * Store a newly created Ececitems in storage.
     *
     * @param CreateEcecitemsRequest $request
     *
     * @return Response
     */
    public function store(CreateEcecitemsRequest $request)
    {
        $input = $request->all();

        $ececitems = $this->ececitemsRepository->create($input);

        return redirect(route('energyClassifications.edit', $ececitems->energyclassifications_id ));
    }

    /**
     * Display the specified Ececitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ececitems = $this->ececitemsRepository->find($id);

        if (empty($ececitems)) {
            return redirect(route('ececitems.index'));
        }

        return view('ececitems.show')->with('ececitems', $ececitems);
    }

    /**
     * Show the form for editing the specified Ececitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ececitems = $this->ececitemsRepository->find($id);

        if (empty($ececitems)) {
            return redirect(route('ececitems.index'));
        }

        return view('ececitems.edit')->with('ececitems', $ececitems);
    }

    /**
     * Update the specified Ececitems in storage.
     *
     * @param int $id
     * @param UpdateEcecitemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEcecitemsRequest $request)
    {
        $ececitems = $this->ececitemsRepository->find($id);

        if (empty($ececitems)) {
            return redirect(route('ececitems.index'));
        }

        $ececitems = $this->ececitemsRepository->update($request->all(), $id);

        return redirect(route('energyClassifications.edit', $ececitems->energyclassifications_id ));
    }

    /**
     * Remove the specified Ececitems from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ececitems = $this->ececitemsRepository->find($id);

        if (empty($ececitems)) {
            return redirect(route('ececitems.index'));
        }

        $this->ececitemsRepository->delete($id);

        return redirect(route('ececitems.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + Ececitems::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



