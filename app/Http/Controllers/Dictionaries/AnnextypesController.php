<?php

namespace App\Http\Controllers\Dictionaries;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAnnextypesRequest;
use App\Http\Requests\UpdateAnnextypesRequest;
use App\Models\Annextypes;
use App\Repositories\AnnextypesRepository;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Response;


class AnnextypesController extends AppBaseController
{
    private $annextypesRepository;

    public function __construct(AnnextypesRepository $annextypesRepo)
    {
        $this->annextypesRepository = $annextypesRepo;
    }

    public function dwData($data): object
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('annextypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn . '<a href="' . route('beforeDestroys', ['Annextypes', $row["id"], 'annextypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index(Request $request): object
    {
        if (Auth::check()) {
            if ($request->ajax()) {
                return $this->dwData($this->annextypesRepository->all());
            }
            return view('pages.dictionaries.annextypes.index');
        }
        return view('pages.dictionaries.annextypes.index');
    }

    public function create(): object
    {
        return view('pages.dictionaries.annextypes.create');
    }

    public function store(CreateAnnextypesRequest $request): object
    {
        $input = $request->all();
        $annextypes = $this->annextypesRepository->create($input);
        return redirect(route('annextypes.index'));
    }

    public function edit($id): object
    {
        $annextypes = $this->annextypesRepository->find($id);
        if (empty($annextypes)) {
            return redirect(route('annextypes.index'));
        }
        return view('pages.dictionaries.annextypes.edit')->with('annextypes', $annextypes);
    }

    public function update($id, UpdateAnnextypesRequest $request): object
    {
        $annextypes = $this->annextypesRepository->find($id);
        if (empty($annextypes)) {
            return redirect(route('annextypes.index'));
        }
        $annextypes = $this->annextypesRepository->update($request->all(), $id);
        return redirect(route('annextypes.index'));
    }

    public function destroy($id): object
    {
        $annextypes = $this->annextypesRepository->find($id);
        if (empty($annextypes)) {
            return redirect(route('annextypes.index'));
        }
        $this->annextypesRepository->delete($id);
        return redirect(route('annextypes.index'));
    }

    public static function DDDW(): array
    {
        return [" "] + annextypes::orderBy('name')->pluck('name', 'id')->toArray();
    }
}



