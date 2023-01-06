<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractpenaltyRequest;
use App\Http\Requests\UpdateContractpenaltyRequest;
use App\Models\Contract;
use App\Repositories\ContractpenaltyRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Contractpenalty;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use Form;

class ContractpenaltyController extends AppBaseController
{
    /** @var ContractpenaltyRepository $contractpenaltyRepository*/
    private $contractpenaltyRepository;

    public function __construct(ContractpenaltyRepository $contractpenaltyRepo)
    {
        $this->contractpenaltyRepository = $contractpenaltyRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('penaltytypes', function($data) { return $data->penaltytypes->name; })
            ->addColumn('constructionphase', function($data) { return $data->constructionphase->name; })
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('contractpenalties.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroysWithParam', ['Contractpenalty', $row->id, 'contractPenaltyIndex', $row->contract_id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Contractpenalty.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = Contractpenalty::query()->when($request->id, function($query, $id){
                    $query->where('contract_id', $id)->get();
                });

                return $this->dwData($data);

            }

            $contract = Contract::find($request->id);

            return view('contractpenalties.index')->with('contract', $contract);
        }
    }

    /**
     * Display a listing of the Contractannex.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function contractPenaltyIndex(Request $request, $id)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = Contractpenalty::where('contract_id', $id)->get();
                return $this->dwData($data);

            }

            $contract = Contract::find($id);

            return view('contractannexes.index')->with('contract', $contract);
        }
    }

    /**
     * Show the form for creating a new Contractpenalty.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $contract = isset($request) ? Contract::find($request->id) : null;
        return view('contractpenalties.create')->with('contract', $contract);
    }

    /**
     * Store a newly created Contractpenalty in storage.
     *
     * @param CreateContractpenaltyRequest $request
     *
     * @return Response
     */
    public function store(CreateContractpenaltyRequest $request)
    {
        $input = $request->all();

        $contractpenalty = $this->contractpenaltyRepository->create($input);

        return redirect(route('contractpenalties.index'));
    }

    /**
     * Display the specified Contractpenalty.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractpenalty = $this->contractpenaltyRepository->find($id);

        if (empty($contractpenalty)) {
            return redirect(route('contractpenalties.index'));
        }

        return view('contractpenalties.show')->with('contractpenalty', $contractpenalty);
    }

    /**
     * Show the form for editing the specified Contractpenalty.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractpenalty = $this->contractpenaltyRepository->find($id);

        if (empty($contractpenalty)) {
            return redirect(route('contractpenalties.index'));
        }

        return view('contractpenalties.edit')->with('contractpenalty', $contractpenalty);
    }

    /**
     * Update the specified Contractpenalty in storage.
     *
     * @param int $id
     * @param UpdateContractpenaltyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractpenaltyRequest $request)
    {
        $contractpenalty = $this->contractpenaltyRepository->find($id);

        if (empty($contractpenalty)) {
            return redirect(route('contractpenalties.index'));
        }

        $contractpenalty = $this->contractpenaltyRepository->update($request->all(), $id);

        $contract = Contract::find($contractpenalty->contract_id);
        return redirect(route('contractpenalties.index'))->with('contract', $contract);
    }

    /**
     * Remove the specified Contractpenalty from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractpenalty = $this->contractpenaltyRepository->find($id);

        if (empty($contractpenalty)) {
            return redirect(route('contractpenalties.index'));
        }

        $this->contractpenaltyRepository->delete($id);

        return redirect(route('contractpenalties.index'));
    }

    /*
     * Dropdown for field select
     *
     * return array
     */
    public static function DDDW() : array
    {
        return [" "] + contractpenalty::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public static function fields($contract = null, $contractpenalty = null) {
        $formGroupArray = [];
        $item = ["label" => Form::label('contract', 'Szerződés:'),
            "field" => Form::text('contract', isset($contract) ? $contract->contractnumber : $contractpenalty->contract->contractnumber,
                ['class'=>'form-control', 'id' => 'contract', 'readonly' => 'true']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('partnercontract_id', 'Alvállakozói:'),
            "field" => Form::select('partnercontract_id', ContractController::subcontractingDDDW(), null,
                ['class'=>'select2 form-control', 'id' => 'partnercontract_id']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('penaltytypes_id', 'Kötbér:'),
            "field" => Form::select('penaltytypes_id', PenaltytypesController::DDDW(), null,
                ['class'=>'select2 form-control', 'id' => 'penaltytypes_id']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('constructionphase_id', 'Építési fázis:'),
            "field" => Form::select('constructionphase_id', ConstructionphaseController::DDDW(), null,
                ['class'=>'select2 form-control', 'id' => 'constructionphase_id']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('deadline', 'Határidő:'),
            "field" => Form::date('deadline', isset($contractpenalty) ? $contractpenalty->deadline : null, ['class' => 'form-control','id'=>'deadline']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('settlementdate', 'Teljesítés:'),
            "field" => Form::date('settlementdate', isset($contractpenalty) ? $contractpenalty->performance : null, ['class' => 'form-control','id'=>'settlementdate']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('commit', 'Megjegyzés:'),
            "field" => Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::hidden('contract_id', 'Szerződés:'),
            "field" => Form::hidden('contract_id', isset($contract) ? $contract->id : $contractpenalty->contract->id, ['class'=>'form-control', 'id' => 'contract_id', 'readonly' => 'true']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        return $formGroupArray;
    }

}



