<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractcontractRequest;
use App\Http\Requests\UpdateContractcontractRequest;
use App\Models\Contract;
use App\Repositories\ContractcontractRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Contractcontract;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use Form;

class ContractcontractController extends AppBaseController
{
    /** @var ContractcontractRepository $contractcontractRepository*/
    private $contractcontractRepository;

    public function __construct(ContractcontractRepository $contractcontractRepo)
    {
        $this->contractcontractRepository = $contractcontractRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('partnercontract', function($data) { return $data->partnercontract->contractnumber; })
            ->addColumn('constructionphase', function($data) { return $data->constructionphase->name; })
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('contractcontracts.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('contractcontracts.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Contractcontract.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = Contractcontract::query()->when($request->id, function($query, $id){
                    $query->where('contract_id', $id)->get();
                });
                return $this->dwData($data);

            }

            $contract = Contract::find($request->id);

            return view('contractcontracts.index')->with('contract', $contract);
        }
    }

    /**
     * Show the form for creating a new Contractannex.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $contract = isset($request) ? Contract::find($request->id) : null;
        return view('contractcontracts.create')->with('contract', $contract);
    }

    /**
     * Store a newly created Contractcontract in storage.
     *
     * @param CreateContractcontractRequest $request
     *
     * @return Response
     */
    public function store(CreateContractcontractRequest $request)
    {
        $input = $request->all();

        $contractcontract = $this->contractcontractRepository->create($input);

        return redirect(route('contractcontracts.index'));
    }

    /**
     * Display the specified Contractcontract.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractcontract = $this->contractcontractRepository->find($id);

        if (empty($contractcontract)) {
            return redirect(route('contractcontracts.index'));
        }

        return view('contractcontracts.show')->with('contractcontract', $contractcontract);
    }

    /**
     * Show the form for editing the specified Contractcontract.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractcontract = $this->contractcontractRepository->find($id);

        if (empty($contractcontract)) {
            return redirect(route('contractcontracts.index'));
        }

        return view('contractcontracts.edit')->with('contractcontract', $contractcontract);
    }

    /**
     * Update the specified Contractcontract in storage.
     *
     * @param int $id
     * @param UpdateContractcontractRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractcontractRequest $request)
    {
        $contractcontract = $this->contractcontractRepository->find($id);

        if (empty($contractcontract)) {
            return redirect(route('contractcontracts.index'));
        }

        $contractcontract = $this->contractcontractRepository->update($request->all(), $id);

        return redirect(route('contractcontracts.index'));
    }

    /**
     * Remove the specified Contractcontract from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractcontract = $this->contractcontractRepository->find($id);

        if (empty($contractcontract)) {
            return redirect(route('contractcontracts.index'));
        }

        $this->contractcontractRepository->delete($id);

        return redirect(route('contractcontracts.index'));
    }

    /*
     * Dropdown for field select
     *
     * return array
     */
    public static function DDDW() : array
    {
        return [" "] + contractcontract::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public static function alvallakozoiDDW()
    {
        return [" "] + Contract::where('contracttypes_id', 1)
            ->where('entrepreneur', function ($query) {
                $query->select('partner_id')->from('partnerspartnertypes')->where('partnertypes_id', 1)->first();
            })->orderBy('contractnumber')->pluck('contractnumber', 'id')->toArray();
    }

    public static function fields($contract = null, $contractcontracts = null) {
        $formGroupArray = [];
        $item = ["label" => Form::label('contract', 'Szerződés:'),
            "field" => Form::text('contract', isset($contract) ? $contract->contractnumber : $contractcontracts->contract->contractnumber,
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
        $item = ["label" => Form::label('constructionphase_id', 'Építési fázis:'),
            "field" => Form::select('constructionphase_id', ConstructionphaseController::DDDW(), null,
                ['class'=>'select2 form-control', 'id' => 'constructionphase_id']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('amount', 'Összeg:'),
            "field" => Form::number('amount', isset($contractcontracts) ? $contractcontracts->amount : 0, ['class' => 'form-control  text-right', 'id' => 'amount']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('deadline', 'Határidő:'),
            "field" => Form::date('deadline', isset($contractcontracts) ? $contractcontracts->deadline : null, ['class' => 'form-control','id'=>'deadline']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('settlementdate', 'Teljesítés:'),
            "field" => Form::date('settlementdate', isset($contractcontracts) ? $contractcontracts->settlementdate : null, ['class' => 'form-control','id'=>'settlementdate']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('commit', 'Megjegyzés:'),
            "field" => Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::label('document_url', 'Dokumentum:'),
            "field" => Form::file('document_url',['class'=>'d-none']),
            "width" => 6,
            "file" => true];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::hidden('document_name', 'Dokumentum:'),
            "field" => Form::hidden('document_name', null, ['class'=>'form-control', 'id' => 'document_name', 'readonly' => 'true']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        $item = ["label" => Form::hidden('contract_id', 'Szerződés:'),
            "field" => Form::hidden('contract_id', isset($contract) ? $contract->id : $contractcontracts->contract->id, ['class'=>'form-control', 'id' => 'contract_id', 'readonly' => 'true']),
            "width" => 6,
            "file" => false];
        array_push($formGroupArray, $item);
        return $formGroupArray;
    }
}



