<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuantityRequest;
use App\Http\Requests\UpdateQuantityRequest;
use App\Models\Quantity;
use App\Repositories\QuantityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class QuantityController extends AppBaseController
{
    /** @var QuantityRepository $quantityRepository*/
    private $quantityRepository;

    public function __construct(QuantityRepository $quantityRepo)
    {
        $this->quantityRepository = $quantityRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('quantities.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Quantities', $row["id"], 'quantities']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Quantity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->quantityRepository->all();
                return $this->dwData($data);

            }

            return view('quantities.index');
        }
    }

    /**
     * Show the form for creating a new Quantity.
     *
     * @return Response
     */
    public function create()
    {
        return view('quantities.create');
    }

    /**
     * Store a newly created Quantity in storage.
     *
     * @param CreateQuantityRequest $request
     *
     * @return Response
     */
    public function store(CreateQuantityRequest $request)
    {
        $input = $request->all();

        $quantity = $this->quantityRepository->create($input);

        return redirect(route('quantities.index'));
    }

    /**
     * Display the specified Quantity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quantity = $this->quantityRepository->find($id);

        if (empty($quantity)) {
            return redirect(route('quantities.index'));
        }

        return view('quantities.show')->with('quantity', $quantity);
    }

    /**
     * Show the form for editing the specified Quantity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quantity = $this->quantityRepository->find($id);

        if (empty($quantity)) {
            return redirect(route('quantities.index'));
        }

        return view('quantities.edit')->with('quantity', $quantity);
    }

    /**
     * Update the specified Quantity in storage.
     *
     * @param int $id
     * @param UpdateQuantityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuantityRequest $request)
    {
        $quantity = $this->quantityRepository->find($id);

        if (empty($quantity)) {
            return redirect(route('quantities.index'));
        }

        $quantity = $this->quantityRepository->update($request->all(), $id);

        return redirect(route('quantities.index'));
    }

    /**
     * Remove the specified Quantity from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quantity = $this->quantityRepository->find($id);

        if (empty($quantity)) {
            return redirect(route('quantities.index'));
        }

        $this->quantityRepository->delete($id);

        return redirect(route('quantities.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + Quantity::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



