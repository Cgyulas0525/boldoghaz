<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartnerbankaccountsRequest;
use App\Http\Requests\UpdatePartnerbankaccountsRequest;
use App\Models\Partners;
use App\Repositories\PartnerbankaccountsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Partnerbankaccounts;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class PartnerbankaccountsController extends AppBaseController
{
    /** @var PartnerbankaccountsRepository $partnerbankaccountsRepository*/
    private $partnerbankaccountsRepository;

    public function __construct(PartnerbankaccountsRepository $partnerbankaccountsRepo)
    {
        $this->partnerbankaccountsRepository = $partnerbankaccountsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('partnerbankaccounts.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('partnerbankaccounts.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Partnerbankaccounts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->partnerbankaccountsRepository->all();
                return $this->dwData($data);

            }

            return view('partnerbankaccounts.index');
        }
    }

    /**
     * Show the form for creating a new Partnerbankaccounts.
     *
     * @return Response
     */
    public function create()
    {
        return view('partnerbankaccounts.create');
    }

    /**
     * Show the form for creating a new Partnerbankaccounts.
     *
     * @return Response
     */
    public function pbaCreate($parentId)
    {
        return view('partnerbankaccounts.create')->with('parentId', $parentId);
    }

    /**
     * Store a newly created Partnerbankaccounts in storage.
     *
     * @param CreatePartnerbankaccountsRequest $request
     *
     * @return Response
     */
    public function store(CreatePartnerbankaccountsRequest $request)
    {
        $input = $request->all();

        $partnerbankaccounts = $this->partnerbankaccountsRepository->create($input);
        $partners = Partners::find($partnerbankaccounts->partners_id);

        return view('partners.edit')->with('partners', $partners);
    }

    /**
     * Display the specified Partnerbankaccounts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partnerbankaccounts = $this->partnerbankaccountsRepository->find($id);

        if (empty($partnerbankaccounts)) {
            return redirect(route('partnerbankaccounts.index'));
        }

        return view('partnerbankaccounts.show')->with('partnerbankaccounts', $partnerbankaccounts);
    }

    /**
     * Show the form for editing the specified Partnerbankaccounts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partnerbankaccounts = $this->partnerbankaccountsRepository->find($id);

        if (empty($partnerbankaccounts)) {
            return redirect(route('partnerbankaccounts.index'));
        }

        return view('partnerbankaccounts.edit')->with('partnerbankaccounts', $partnerbankaccounts);
    }

    /**
     * Update the specified Partnerbankaccounts in storage.
     *
     * @param int $id
     * @param UpdatePartnerbankaccountsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartnerbankaccountsRequest $request)
    {
        $partnerbankaccounts = $this->partnerbankaccountsRepository->find($id);

        if (empty($partnerbankaccounts)) {
            return redirect(route('partnerbankaccounts.index'));
        }

        $partnerbankaccounts = $this->partnerbankaccountsRepository->update($request->all(), $id);
        $partners = Partners::find($partnerbankaccounts->partners_id);

        return view('partners.edit')->with('partners', $partners);
    }

    /**
     * Remove the specified Partnerbankaccounts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partnerbankaccounts = $this->partnerbankaccountsRepository->find($id);

        if (empty($partnerbankaccounts)) {
            return redirect(route('partnerbankaccounts.index'));
        }

        $this->partnerbankaccountsRepository->delete($id);

        return redirect(route('partnerbankaccounts.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + partnerbankaccounts::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



