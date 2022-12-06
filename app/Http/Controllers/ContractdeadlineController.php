<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractdeadlineRequest;
use App\Http\Requests\UpdateContractdeadlineRequest;
use App\Models\Contract;
use App\Repositories\ContractdeadlineRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Contractdeadline;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class ContractdeadlineController extends AppBaseController
{
    /** @var ContractdeadlineRepository $contractdeadlineRepository*/
    private $contractdeadlineRepository;

    public function __construct(ContractdeadlineRepository $contractdeadlineRepo)
    {
        $this->contractdeadlineRepository = $contractdeadlineRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('constructionphase', function($data) { return $data->constructionphase->name; })
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('contractdeadlines.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroysWithParam', ['Contractdeadline', $row->id, 'contractDeadLineIndex', $row->contract_id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                $btn = $btn.'<a href="' . route('contractdeadlineitemIndex', $row->id) . '"
                                  class="btn btn-warning btn-sm reszhataridok" title="Részhatáridők"><i class="fas fa-solar-panel"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Contractdeadline.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->contractdeadlineRepository->all();
                return $this->dwData($data);

            }

            return view('contractdeadlines.index');
        }
    }

    /**
     * Display a listing of the Contractdeadline.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function contractDeadLineIndex(Request $request, $id)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = Contractdeadline::where('contract_id', $id)->get();
                return $this->dwData($data);

            }

            $contract = Contract::find($id);

            return view('contractdeadlines.index')->with('contract', $contract);
        }
    }

    /**
     * Show the form for creating a new Contractdeadline.
     *
     * @return Response
     */
    public function create()
    {
        return view('contractdeadlines.create');
    }

    /**
     * Show the form for creating a new Contractannex.
     *
     * @return Response
     */
    public function contractDeadLineCreate($id)
    {
        $contract = Contract::find($id);
        return view('contractdeadlines.create')->with('contract', $contract);
    }


    /**
     * Store a newly created Contractdeadline in storage.
     *
     * @param CreateContractdeadlineRequest $request
     *
     * @return Response
     */
    public function store(CreateContractdeadlineRequest $request)
    {
        $input = $request->all();

        $contractdeadline = $this->contractdeadlineRepository->create($input);

        $contract = Contract::find($contractdeadline->contract_id);

        return view('contractdeadlines.index')->with('contract', $contract);
    }

    /**
     * Display the specified Contractdeadline.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractdeadline = $this->contractdeadlineRepository->find($id);

        if (empty($contractdeadline)) {
            return redirect(route('contractdeadlines.index'));
        }

        return view('contractdeadlines.show')->with('contractdeadline', $contractdeadline);
    }

    /**
     * Show the form for editing the specified Contractdeadline.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractdeadline = $this->contractdeadlineRepository->find($id);

        if (empty($contractdeadline)) {
            return redirect(route('contractdeadlines.index'));
        }

        return view('contractdeadlines.edit')->with('contractdeadline', $contractdeadline);
    }

    /**
     * Update the specified Contractdeadline in storage.
     *
     * @param int $id
     * @param UpdateContractdeadlineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractdeadlineRequest $request)
    {
        $contractdeadline = $this->contractdeadlineRepository->find($id);

        if (empty($contractdeadline)) {
            return redirect(route('contractdeadlines.index'));
        }

        $contractdeadline = $this->contractdeadlineRepository->update($request->all(), $id);

        return redirect(route('contractdeadlines.index'));
    }

    /**
     * Remove the specified Contractdeadline from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractdeadline = $this->contractdeadlineRepository->find($id);

        if (empty($contractdeadline)) {
            return redirect(route('contractdeadlines.index'));
        }

        $this->contractdeadlineRepository->delete($id);

        return redirect(route('contractdeadlines.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + contractdeadline::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



