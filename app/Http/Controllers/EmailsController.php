<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmailsRequest;
use App\Http\Requests\UpdateEmailsRequest;
use App\Repositories\EmailsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Emails;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class EmailsController extends AppBaseController
{
    /** @var EmailsRepository $emailsRepository*/
    private $emailsRepository;

    public function __construct(EmailsRepository $emailsRepo)
    {
        $this->emailsRepository = $emailsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('parentName', function($data) { return $data->parentName; })
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('emails.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('emails.destroy', [$row->id]) . '"
                             class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Emails.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->emailsRepository->all();
                return $this->dwData($data);

            }

            return view('emails.index');
        }
    }

    /**
     * Show the form for creating a new Emails.
     *
     * @return Response
     */
    public function create()
    {
        return view('emails.create');
    }

    /**
     * Show the form for creating a new Emails.
     *
     * @return Response
     */
    public function peCreate($parentId)
    {
        return view('emails.create')->with('parentId', $parentId);
    }

    /**
     * Store a newly created Emails in storage.
     *
     * @param CreateEmailsRequest $request
     *
     * @return Response
     */
    public function store(CreateEmailsRequest $request)
    {
        $input = $request->all();

        $emails = $this->emailsRepository->create($input);

        return redirect(route('partners.edit', $emails->parent_id));
    }

    /**
     * Display the specified Emails.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $emails = $this->emailsRepository->find($id);

        if (empty($emails)) {
            return redirect(route('partners.edit', $emails->parent_id));
        }

        return view('emails.show')->with('emails', $emails);
    }

    /**
     * Show the form for editing the specified Emails.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $emails = $this->emailsRepository->find($id);

        if (empty($emails)) {
            return redirect(route('partners.edit', $emails->parent_id));
        }

        return view('emails.edit')->with('emails', $emails);
    }

    /**
     * Update the specified Emails in storage.
     *
     * @param int $id
     * @param UpdateEmailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmailsRequest $request)
    {
        $emails = $this->emailsRepository->find($id);

        if (empty($emails)) {
            return redirect(route('partners.edit', $emails->parent_id));
        }

        $emails = $this->emailsRepository->update($request->all(), $id);

        return redirect(route('partners.edit', $emails->parent_id));
    }

    /**
     * Remove the specified Emails from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $emails = $this->emailsRepository->find($id);

        if (empty($emails)) {
            return redirect(route('emails.index'));
        }

        $this->emailsRepository->delete($id);

        return redirect(route('emails.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + emails::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



