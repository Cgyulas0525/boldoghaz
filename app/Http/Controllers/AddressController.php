<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PrimeChangeController;
use App\Http\Requests\CreateAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Repositories\AddressRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Address;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;


class AddressController extends AppBaseController
{
    /** @var AddressRepository $addressRepository*/
    private $addressRepository;

    public function __construct(AddressRepository $addressRepo)
    {
        $this->addressRepository = $addressRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('fullAddress', function($data) { return $data->fullAddress; })
            ->addColumn('parentName', function($data) { return $data->parentName; })
            ->addColumn('typeName', function($data) { return $data->addresstypes->name; })
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('addresses.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('partners.edit', [$row->parent_id]) . '"
                             class="edit btn btn-warning btn-sm editProduct" title="Adatlap"><i class="fas fa-table"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Address.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->addressRepository->all();
                return $this->dwData($data);

            }

            return view('addresses.index');
        }
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return Response
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return Response
     */
    public function paCreate($parentId)
    {
        return view('addresses.create')->with('parentId', $parentId);
    }

    /**
     * Store a newly created Address in storage.
     *
     * @param CreateAddressRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressRequest $request)
    {
        $input = $request->all();

        $address = $this->addressRepository->create($input);
        if ($address->prime == 1) {
            PrimeChangeController::primeChange('Address', $address);
        }

        return redirect(route('partners.edit', $address->parent_id));
    }

    /**
     * Display the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            return redirect(route('partners.edit', $address->parent_id));
        }

        return view('addresses.show')->with('address', $address);
    }

    /**
     * Show the form for editing the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            return redirect(route('partners.edit', $address->parent_id));
        }

        return view('addresses.edit')->with('address', $address);
    }

    /**
     * Update the specified Address in storage.
     *
     * @param int $id
     * @param UpdateAddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddressRequest $request)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            return redirect(route('partners.edit', $address->parent_id));
        }

        $address = $this->addressRepository->update($request->all(), $id);
        if ($address->prime == 1) {
            PrimeChangeController::primeChange('Address', $address);
        }

        return redirect(route('partners.edit', $address->parent_id));
    }

    /**
     * Remove the specified Address from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            return redirect(route('addresses.index'));
        }

        $this->addressRepository->delete($id);

        return redirect(route('addresses.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + Address::orderBy('address')->pluck('address', 'id')->toArray();
        }
}



