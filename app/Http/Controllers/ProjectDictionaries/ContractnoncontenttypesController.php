<?php

namespace App\Http\Controllers\ProjectDictionaries;

use App\Classes\Utility\utilityClass;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateContractnoncontenttypesRequest;
use App\Http\Requests\UpdateContractnoncontenttypesRequest;
use App\Models\Contractnoncontenttypes;
use App\Repositories\ContractnoncontenttypesRepository;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class ContractnoncontenttypesController extends AppBaseController
{
    /** @var ContractnoncontenttypesRepository $contractnoncontenttypesRepository*/
    private $contractnoncontenttypesRepository;

    public function __construct(ContractnoncontenttypesRepository $contractnoncontenttypesRepo)
    {
        $this->contractnoncontenttypesRepository = $contractnoncontenttypesRepo;
    }

    public function dwData($data): object
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('typeName', function($data) { return $data->typeName; })
            ->addColumn('action', function($row){
                if (!utilityClass::protectedRecord('contractnoncontenttypes', $row->id)) {
                    $btn = '<a href="' . route('contractnoncontenttypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                    $btn = $btn . '<a href="' . route('contractnoncontenttypes.destroy', [$row->id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                    return $btn;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index(Request $request): object
    {
        if( Auth::check() ){
            if ($request->ajax()) {
                $data = $this->contractnoncontenttypesRepository->all();
                return $this->dwData($data);
            }
            return view('pages.project-dictionaries.contractnoncontenttypes.index');
        }
        return view('pages.project-dictionaries.contractnoncontenttypes.index');
    }

    public function create(): object
    {
        return view('pages.project-dictionaries.contractnoncontenttypes.create');
    }

    public function store(CreateContractnoncontenttypesRequest $request): object
    {
        $input = $request->all();
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->create($input);
        return redirect(route('contractnoncontenttypes.index'));
    }

    public function show($id): object
    {
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->find($id);
        if (empty($contractnoncontenttypes)) {
            return redirect(route('contractnoncontenttypes.index'));
        }
        return view('pages.project-dictionaries.contractnoncontenttypes.show')->with('contractnoncontenttypes', $contractnoncontenttypes);
    }

    public function edit($id): object
    {
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->find($id);
        if (empty($contractnoncontenttypes)) {
            return redirect(route('contractnoncontenttypes.index'));
        }
        return view('pages.project-dictionaries.contractnoncontenttypes.edit')->with('contractnoncontenttypes', $contractnoncontenttypes);
    }

    public function update($id, UpdateContractnoncontenttypesRequest $request): object
    {
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->find($id);
        if (empty($contractnoncontenttypes)) {
            return redirect(route('contractnoncontenttypes.index'));
        }
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->update($request->all(), $id);
        return redirect(route('contractnoncontenttypes.index'));
    }

    public function destroy($id): object
    {
        $contractnoncontenttypes = $this->contractnoncontenttypesRepository->find($id);
        if (empty($contractnoncontenttypes)) {
            return redirect(route('contractnoncontenttypes.index'));
        }
        $this->contractnoncontenttypesRepository->delete($id);
        return redirect(route('contractnoncontenttypes.index'));
    }

    public static function DDDW() : array
    {
        return [" "] + contractnoncontenttypes::orderBy('name')->pluck('name', 'id')->toArray();
    }
}



