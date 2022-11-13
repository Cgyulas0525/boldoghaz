<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractnoncontentRequest;
use App\Http\Requests\UpdateContractnoncontentRequest;
use App\Repositories\ContractnoncontentRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Contractnoncontent;
use App\Models\Contractnoncontenttypes;
use App\Models\Contract;
use App\Classes\Contract\contractChild;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class ContractnoncontentController extends AppBaseController
{
    /** @var ContractnoncontentRepository $contractnoncontentRepository*/
    private $contractnoncontentRepository;
    private $contractChild;

    public function __construct(ContractnoncontentRepository $contractnoncontentRepo)
    {
        $this->contractnoncontentRepository = $contractnoncontentRepo;
        $this->contractChild = new contractChild();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('contractnumber', function($data) { return $data->contract->contractnumber; })
            ->addColumn('contractnoncontenttypes', function($data) { return $data->contractnoncontenttypes->name; })
            ->addColumn('action', function($row){
                $btn = '';
                $btn = $btn.'<a href="' . route('beforeDestroysWithParam', ['Contractnoncontent', $row->id, 'contractnoncontentIndex', $row->contract_id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Display a listing of the Contractcontent.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function contractnoncontentIndex(Request $request, $id)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                if (Contractnoncontent::where('contract_id', $id)->get()->count() == 0) {
                    $this->contractChild->allRecords('contractnoncontent', $id);
                }
                $data = Contractnoncontent::where('contract_id', $id)->get();
                return $this->dwData($data);

            }

            $contract = Contract::find($id);

            return view('contractnoncontents.index')->with('contract', $contract);
        }
    }



    /**
     * Display a listing of the Contractnoncontent.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->contractnoncontentRepository->all();
                return $this->dwData($data);

            }

            return view('contractnoncontents.index');
        }
    }

    /**
     * Show the form for creating a new Contractnoncontent.
     *
     * @return Response
     */
    public function create()
    {
        return view('contractnoncontents.create');
    }

    /**
     * Show the form for creating a new Contractcontent.
     *
     * @return Response
     */
    public function contractNonContentCreate($id)
    {
        $contract = Contract::find($id);

        return view('contractnoncontents.create')->with('contract', $contract);
    }

    /**
     * Store a newly created Contractnoncontent in storage.
     *
     * @param CreateContractnoncontentRequest $request
     *
     * @return Response
     */
    public function store(CreateContractnoncontentRequest $request)
    {
        $input = $request->all();

        $contractnoncontent = $this->contractnoncontentRepository->create($input);

        return redirect(route('contractnoncontents.index'));
    }

    /**
     * Display the specified Contractnoncontent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractnoncontent = $this->contractnoncontentRepository->find($id);

        if (empty($contractnoncontent)) {
            return redirect(route('contractnoncontents.index'));
        }

        return view('contractnoncontents.show')->with('contractnoncontent', $contractnoncontent);
    }

    /**
     * Show the form for editing the specified Contractnoncontent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractnoncontent = $this->contractnoncontentRepository->find($id);

        if (empty($contractnoncontent)) {
            return redirect(route('contractnoncontents.index'));
        }

        return view('contractnoncontents.edit')->with('contractnoncontent', $contractnoncontent);
    }

    /**
     * Update the specified Contractnoncontent in storage.
     *
     * @param int $id
     * @param UpdateContractnoncontentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractnoncontentRequest $request)
    {
        $contractnoncontent = $this->contractnoncontentRepository->find($id);

        if (empty($contractnoncontent)) {
            return redirect(route('contractnoncontents.index'));
        }

        $contractnoncontent = $this->contractnoncontentRepository->update($request->all(), $id);

        return redirect(route('contractnoncontents.index'));
    }

    /**
     * Remove the specified Contractnoncontent from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractnoncontent = $this->contractnoncontentRepository->find($id);

        if (empty($contractnoncontent)) {
            return redirect(route('contractnoncontents.index'));
        }

        $this->contractnoncontentRepository->delete($id);

        return redirect(route('contractnoncontents.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + contractnoncontent::orderBy('name')->pluck('name', 'id')->toArray();
        }

    public static function whereNotInDDDW($id) : array
    {
        return [" "] + Contractnoncontenttypes::whereNotIn('id', function ($query) use($id) {
                return $query->from('contractnoncontent')->select('contractnoncontenttypes_id')->where('contract_id', $id)->whereNull('deleted_at')->get();
            })->orderBy('name')->pluck('name', 'id')->toArray();
    }

}



