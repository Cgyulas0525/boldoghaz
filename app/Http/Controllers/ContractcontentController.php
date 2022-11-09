<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractcontentRequest;
use App\Http\Requests\UpdateContractcontentRequest;
use App\Models\Contract;
use App\Models\Contractcontenttypes;
use App\Repositories\ContractcontentRepository;
use App\Http\Controllers\AppBaseController;

use App\Classes\Contract\contractChild;

use App\Models\Contractcontent;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class ContractcontentController extends AppBaseController
{
    /** @var ContractcontentRepository $contractcontentRepository*/
    private $contractcontentRepository;
    private $contractChild;

    public function __construct(ContractcontentRepository $contractcontentRepo)
    {
        $this->contractcontentRepository = $contractcontentRepo;
        $this->contractChild = new contractChild();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('contractnumber', function($data) { return $data->contract->contractnumber; })
            ->addColumn('contractcontenttypes', function($data) { return $data->contractcontenttypes->name; })
            ->addColumn('action', function($row){
                $btn = '';
                $btn = $btn.'<a href="' . route('beforeDestroysWithParam', ['Contractcontent', $row->id, 'contractcontentIndex', $row->contract_id]) . '"
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
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->contractcontentRepository->all();
                return $this->dwData($data);

            }

            return view('contractcontents.index');
        }
    }

    public function contractContentAllButton($id) {
        $this->contractChild->allRecords('contractcontent', $id);
        return back();
    }

    /**
     * Display a listing of the Contractcontent.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function contractcontentIndex(Request $request, $id)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                if (ContractContent::where('contract_id', $id)->get()->count() == 0) {
                    $this->contractChild->allRecords('contractcontent', $id);
                }
                $data = Contractcontent::where('contract_id', $id)->get();
                return $this->dwData($data);

            }

            $contract = Contract::find($id);

            return view('contractcontents.index')->with('contract', $contract);
        }
    }

    /**
     * Show the form for creating a new Contractcontent.
     *
     * @return Response
     */
    public function create($id)
    {
        $contract = Contract::find($id);

        return view('contractcontents.create')->with('contract', $contract);
    }

    /**
     * Show the form for creating a new Contractcontent.
     *
     * @return Response
     */
    public function contractContentCreate($id)
    {
        $contract = Contract::find($id);

        return view('contractcontents.create')->with('contract', $contract);
    }

    /**
     * Store a newly created Contractcontent in storage.
     *
     * @param CreateContractcontentRequest $request
     *
     * @return Response
     */
    public function store(CreateContractcontentRequest $request)
    {
        $input = $request->all();

        $contractcontent = Contractcontent::withTrashed()
                            ->where('contract_id', $request->contract_id)
                            ->where('contractcontenttypes_id', $request->contractcontenttypes_id)
                            ->first();

        if (empty($contractcontent)) {
            $contractcontent = $this->contractcontentRepository->create($input);
        } else {
            $contractcontent->deleted_at = NULL;
            $contractcontent->update();
        }

        $contract = Contract::find($contractcontent->contract_id);

        return view('contractcontents.index')->with('contract', $contract);
    }

    /**
     * Display the specified Contractcontent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractcontent = $this->contractcontentRepository->find($id);

        if (empty($contractcontent)) {
            return redirect(route('contractcontents.index'));
        }

        return view('contractcontents.show')->with('contractcontent', $contractcontent);
    }

    /**
     * Show the form for editing the specified Contractcontent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractcontent = $this->contractcontentRepository->find($id);

        if (empty($contractcontent)) {
            return redirect(route('contractcontents.index'));
        }

        return view('contractcontents.edit')->with('contractcontent', $contractcontent);
    }

    /**
     * Update the specified Contractcontent in storage.
     *
     * @param int $id
     * @param UpdateContractcontentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractcontentRequest $request)
    {
        $contractcontent = $this->contractcontentRepository->find($id);

        if (empty($contractcontent)) {
            return redirect(route('contractcontents.index'));
        }

        $contractcontent = $this->contractcontentRepository->update($request->all(), $id);

        return redirect(route('contractcontents.index'));
    }

    /**
     * Remove the specified Contractcontent from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractcontent = $this->contractcontentRepository->find($id);

        if (empty($contractcontent)) {
            return redirect(route('contractcontents.index'));
        }

        $this->contractcontentRepository->delete($id);

        return redirect(route('contractcontents.index'));
    }

    /*
     * Dropdown for field select
     *
     * return array
     */
    public static function DDDW() : array
    {
        return [" "] + contractcontent::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public static function whereNotInDDDW($id) : array
    {
        return [" "] + Contractcontenttypes::whereNotIn('id', function ($query) use($id) {
                return $query->from('contractcontent')->select('contractcontenttypes_id')->where('contract_id', $id)->whereNull('deleted_at')->get();
            })->orderBy('name')->pluck('name', 'id')->toArray();
    }
}



