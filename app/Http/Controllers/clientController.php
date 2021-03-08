<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateclientRequest;
use App\Http\Requests\UpdateclientRequest;
use App\Repositories\clientRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class clientController extends AppBaseController
{
    /** @var  clientRepository */
    private $clientRepository;

    public function __construct(clientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the client.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientRepository->pushCriteria(new RequestCriteria($request));
        $clients = $this->clientRepository->all();

        return view('clients.index')
            ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new client.
     *
     * @return Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created client in storage.
     *
     * @param CreateclientRequest $request
     *
     * @return Response
     */
    public function store(CreateclientRequest $request)
    {
        $input = $request->all();

        $client = $this->clientRepository->create($input);

        Flash::success('Client saved successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        return view('clients.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        return view('clients.edit')->with('client', $client);
    }

    /**
     * Update the specified client in storage.
     *
     * @param  int              $id
     * @param UpdateclientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclientRequest $request)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $client = $this->clientRepository->update($request->all(), $id);

        Flash::success('Client updated successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified client from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $this->clientRepository->delete($id);

        Flash::success('Client deleted successfully.');

        return redirect(route('clients.index'));
    }
}
