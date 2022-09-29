<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PrimeChangeController;

use App\Http\Requests\CreatePhonenumbersRequest;
use App\Http\Requests\UpdatePhonenumbersRequest;
use App\Repositories\PhonenumbersRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Phonenumbers;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class PhonenumbersController extends AppBaseController
{
    /** @var PhonenumbersRepository $phonenumbersRepository*/
    private $phonenumbersRepository;

    public function __construct(PhonenumbersRepository $phonenumbersRepo)
    {
        $this->phonenumbersRepository = $phonenumbersRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('typeName', function($data) { return $data->phonenumbertypes->name; })
            ->addColumn('parentName', function($data) { return $data->parentName; })
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('phonenumbers.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('phonenumbers.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Phonenumbers.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->phonenumbersRepository->all();
                return $this->dwData($data);

            }

            return view('phonenumbers.index');
        }
    }

    /**
     * Show the form for creating a new Phonenumbers.
     *
     * @return Response
     */
    public function create()
    {
        return view('phonenumbers.create');
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return Response
     */
    public function pphoneCreate($parentId)
    {
        return view('phonenumbers.create')->with('parentId', $parentId);
    }


    /**
     * Store a newly created Phonenumbers in storage.
     *
     * @param CreatePhonenumbersRequest $request
     *
     * @return Response
     */
    public function store(CreatePhonenumbersRequest $request)
    {
        $input = $request->all();

        $phonenumbers = $this->phonenumbersRepository->create($input);
        if ($phonenumbers->prime == 1) {
            PrimeChangeController::primeChange('Phonenumbers', $phonenumbers);
        }


        return redirect(route('partners.edit', $phonenumbers->parent_id));
    }

    /**
     * Display the specified Phonenumbers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $phonenumbers = $this->phonenumbersRepository->find($id);

        if (empty($phonenumbers)) {
            return redirect(route('phonenumbers.index'));
        }

        return view('phonenumbers.show')->with('phonenumbers', $phonenumbers);
    }

    /**
     * Show the form for editing the specified Phonenumbers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $phonenumbers = $this->phonenumbersRepository->find($id);

        if (empty($phonenumbers)) {
            return redirect(route('phonenumbers.index'));
        }

        return view('phonenumbers.edit')->with('phonenumbers', $phonenumbers);
    }

    /**
     * Update the specified Phonenumbers in storage.
     *
     * @param int $id
     * @param UpdatePhonenumbersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhonenumbersRequest $request)
    {
        $phonenumbers = $this->phonenumbersRepository->find($id);

        if (empty($phonenumbers)) {
            return redirect(route('phonenumbers.index'));
        }

        $phonenumbers = $this->phonenumbersRepository->update($request->all(), $id);
        if ($phonenumbers->prime == 1) {
            PrimeChangeController::primeChange('Phonenumbers', $phonenumbers);
        }

        return redirect(route('partners.edit', $phonenumbers->parent_id));
    }

    /**
     * Remove the specified Phonenumbers from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $phonenumbers = $this->phonenumbersRepository->find($id);

        if (empty($phonenumbers)) {
            return redirect(route('phonenumbers.index'));
        }

        $this->phonenumbersRepository->delete($id);

        return redirect(route('phonenumbers.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + phonenumbers::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



