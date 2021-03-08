<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedomaineAPIRequest;
use App\Http\Requests\API\UpdatedomaineAPIRequest;
use App\Models\domaine;
use App\Repositories\domaineRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class domaineController
 * @package App\Http\Controllers\API
 */

class domaineAPIController extends AppBaseController
{
    /** @var  domaineRepository */
    private $domaineRepository;

    public function __construct(domaineRepository $domaineRepo)
    {
        $this->domaineRepository = $domaineRepo;
    }

    /**
     * Display a listing of the domaine.
     * GET|HEAD /domaines
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->domaineRepository->pushCriteria(new RequestCriteria($request));
        $this->domaineRepository->pushCriteria(new LimitOffsetCriteria($request));
        $domaines = $this->domaineRepository->all();

        return $this->sendResponse($domaines->toArray(), 'Domaines retrieved successfully');
    }

    /**
     * Store a newly created domaine in storage.
     * POST /domaines
     *
     * @param CreatedomaineAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedomaineAPIRequest $request)
    {
        $input = $request->all();

        $domaines = $this->domaineRepository->create($input);

        return $this->sendResponse($domaines->toArray(), 'Domaine saved successfully');
    }

    /**
     * Display the specified domaine.
     * GET|HEAD /domaines/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var domaine $domaine */
        $domaine = $this->domaineRepository->findWithoutFail($id);

        if (empty($domaine)) {
            return $this->sendError('Domaine not found');
        }

        return $this->sendResponse($domaine->toArray(), 'Domaine retrieved successfully');
    }

    /**
     * Update the specified domaine in storage.
     * PUT/PATCH /domaines/{id}
     *
     * @param  int $id
     * @param UpdatedomaineAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedomaineAPIRequest $request)
    {
        $input = $request->all();

        /** @var domaine $domaine */
        $domaine = $this->domaineRepository->findWithoutFail($id);

        if (empty($domaine)) {
            return $this->sendError('Domaine not found');
        }

        $domaine = $this->domaineRepository->update($input, $id);

        return $this->sendResponse($domaine->toArray(), 'domaine updated successfully');
    }

    /**
     * Remove the specified domaine from storage.
     * DELETE /domaines/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var domaine $domaine */
        $domaine = $this->domaineRepository->findWithoutFail($id);

        if (empty($domaine)) {
            return $this->sendError('Domaine not found');
        }

        $domaine->delete();

        return $this->sendResponse($id, 'Domaine deleted successfully');
    }
}
