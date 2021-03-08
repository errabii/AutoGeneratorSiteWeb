<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateclientAPIRequest;
use App\Http\Requests\API\UpdateclientAPIRequest;
use App\Models\client;
use App\Repositories\clientRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class clientController
 * @package App\Http\Controllers\API
 */

class clientAPIController extends AppBaseController
{
    /** @var  clientRepository */
    private $clientRepository;

    public function __construct(clientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the client.
     * GET|HEAD /clients
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientRepository->pushCriteria(new RequestCriteria($request));
        $this->clientRepository->pushCriteria(new LimitOffsetCriteria($request));
        $clients = $this->clientRepository->all();

        return $this->sendResponse($clients->toArray(), 'Clients retrieved successfully');
    }

    /**
     * Store a newly created client in storage.
     * POST /clients
     *
     * @param CreateclientAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateclientAPIRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientRepository->create($input);

        return $this->sendResponse($clients->toArray(), 'Client saved successfully');
    }

    /**
     * Display the specified client.
     * GET|HEAD /clients/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var client $client */
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            return $this->sendError('Client not found');
        }

        return $this->sendResponse($client->toArray(), 'Client retrieved successfully');
    }

    /**
     * Update the specified client in storage.
     * PUT/PATCH /clients/{id}
     *
     * @param  int $id
     * @param UpdateclientAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclientAPIRequest $request)
    {
        $input = $request->all();

        /** @var client $client */
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            return $this->sendError('Client not found');
        }

        $client = $this->clientRepository->update($input, $id);

        return $this->sendResponse($client->toArray(), 'client updated successfully');
    }

    /**
     * Remove the specified client from storage.
     * DELETE /clients/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var client $client */
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            return $this->sendError('Client not found');
        }

        $client->delete();

        return $this->sendResponse($id, 'Client deleted successfully');
    }
}
