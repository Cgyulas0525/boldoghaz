<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractdeadlineitemRequest;
use App\Http\Requests\UpdateContractdeadlineitemRequest;
use App\Repositories\ContractdeadlineitemRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Contractdeadlineitem;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class ContractdeadlineitemController extends AppBaseController
{
    /** @var ContractdeadlineitemRepository $contractdeadlineitemRepository*/
    private $contractdeadlineitemRepository;

    public function __construct(ContractdeadlineitemRepository $contractdeadlineitemRepo)
    {
        $this->contractdeadlineitemRepository = $contractdeadlineitemRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('contractdeadlineitems.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('contractdeadlineitems.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Contractdeadlineitem.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->contractdeadlineitemRepository->all();
                return $this->dwData($data);

            }

            return view('contractdeadlineitems.index');
        }
    }

    /**
     * Show the form for creating a new Contractdeadlineitem.
     *
     * @return Response
     */
    public function create()
    {
        return view('contractdeadlineitems.create');
    }

    /**
     * Store a newly created Contractdeadlineitem in storage.
     *
     * @param CreateContractdeadlineitemRequest $request
     *
     * @return Response
     */
    public function store(CreateContractdeadlineitemRequest $request)
    {
        $input = $request->all();

        $contractdeadlineitem = $this->contractdeadlineitemRepository->create($input);

        return redirect(route('contractdeadlineitems.index'));
    }

    /**
     * Display the specified Contractdeadlineitem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractdeadlineitem = $this->contractdeadlineitemRepository->find($id);

        if (empty($contractdeadlineitem)) {
            return redirect(route('contractdeadlineitems.index'));
        }

        return view('contractdeadlineitems.show')->with('contractdeadlineitem', $contractdeadlineitem);
    }

    /**
     * Show the form for editing the specified Contractdeadlineitem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractdeadlineitem = $this->contractdeadlineitemRepository->find($id);

        if (empty($contractdeadlineitem)) {
            return redirect(route('contractdeadlineitems.index'));
        }

        return view('contractdeadlineitems.edit')->with('contractdeadlineitem', $contractdeadlineitem);
    }

    /**
     * Update the specified Contractdeadlineitem in storage.
     *
     * @param int $id
     * @param UpdateContractdeadlineitemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractdeadlineitemRequest $request)
    {
        $contractdeadlineitem = $this->contractdeadlineitemRepository->find($id);

        if (empty($contractdeadlineitem)) {
            return redirect(route('contractdeadlineitems.index'));
        }

        $contractdeadlineitem = $this->contractdeadlineitemRepository->update($request->all(), $id);

        return redirect(route('contractdeadlineitems.index'));
    }

    /**
     * Remove the specified Contractdeadlineitem from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractdeadlineitem = $this->contractdeadlineitemRepository->find($id);

        if (empty($contractdeadlineitem)) {
            return redirect(route('contractdeadlineitems.index'));
        }

        $this->contractdeadlineitemRepository->delete($id);

        return redirect(route('contractdeadlineitems.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + contractdeadlineitem::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



