<?php

namespace App\Http\Controllers\ProjectDictionaries;

use App\Classes\Utility\utilityClass;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateContractcontenttypesRequest;
use App\Http\Requests\UpdateContractcontenttypesRequest;
use App\Models\Contractcontenttypes;
use App\Repositories\ContractcontenttypesRepository;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Response;


class ContractcontenttypesController extends AppBaseController
{
    private $contractcontenttypesRepository;

    public function __construct(ContractcontenttypesRepository $contractcontenttypesRepo)
    {
        $this->contractcontenttypesRepository = $contractcontenttypesRepo;
    }

    public function dwData($data): object
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('typeName', function ($data) {
                return $data->typeName;
            })
            ->addColumn('action', function ($row) {
                if (!utilityClass::protectedRecord('contractcontenttypes', $row->id)) {
                    $btn = '<a href="' . route('contractcontenttypes.edit', [$row->id]) . '"
                                 class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                    $btn = $btn . '<a href="' . route('contractcontenttypes.destroy', [$row->id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                    return $btn;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index(Request $request): object
    {
        if (Auth::check()) {
            if ($request->ajax()) {
                return $this->dwData($this->contractcontenttypesRepository->all());
            }
            return view('pages.project-dictionaries.contractcontenttypes.index');
        }
        return view('pages.project-dictionaries.contractcontenttypes.index');
    }

    public function create()
    {
        return view('pages.project-dictionaries.contractcontenttypes.create');
    }

    public function store(CreateContractcontenttypesRequest $request): object
    {
        $input = $request->all();
        $contractcontenttypes = $this->contractcontenttypesRepository->create($input);
        return redirect(route('contractcontenttypes.index'));
    }

    public function edit($id): object
    {
        $contractcontenttypes = $this->contractcontenttypesRepository->find($id);
        if (empty($contractcontenttypes)) {
            return redirect(route('contractcontenttypes.index'));
        }
        return view('pages.project-dictionaries.contractcontenttypes.edit')->with('contractcontenttypes', $contractcontenttypes);
    }

    public function update($id, UpdateContractcontenttypesRequest $request): object
    {
        $contractcontenttypes = $this->contractcontenttypesRepository->find($id);
        if (empty($contractcontenttypes)) {
            return redirect(route('contractcontenttypes.index'));
        }
        $contractcontenttypes = $this->contractcontenttypesRepository->update($request->all(), $id);
        return redirect(route('contractcontenttypes.index'));
    }

    public function destroy($id): object
    {
        $contractcontenttypes = $this->contractcontenttypesRepository->find($id);
        if (empty($contractcontenttypes)) {
            return redirect(route('contractcontenttypes.index'));
        }
        $this->contractcontenttypesRepository->delete($id);
        return redirect(route('contractcontenttypes.index'));
    }

    public static function DDDW(): array
    {
        return [" "] + contractcontenttypes::orderBy('name')->pluck('name', 'id')->toArray();
    }
}



