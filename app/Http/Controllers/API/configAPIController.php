<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateconfigAPIRequest;
use App\Http\Requests\API\UpdateconfigAPIRequest;
use App\Models\config;
use App\Repositories\configRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class configController
 * @package App\Http\Controllers\API
 */

class configAPIController extends AppBaseController
{
    /** @var  configRepository */
    private $configRepository;

    public function __construct(configRepository $configRepo)
    {
        $this->configRepository = $configRepo;
    }

    /**
     * Display a listing of the config.
     * GET|HEAD /configs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->configRepository->pushCriteria(new RequestCriteria($request));
        $this->configRepository->pushCriteria(new LimitOffsetCriteria($request));
        $configs = $this->configRepository->all();

        return $this->sendResponse($configs->toArray(), 'Configs retrieved successfully');
    }

    /**
     * Store a newly created config in storage.
     * POST /configs
     *
     * @param CreateconfigAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateconfigAPIRequest $request)
    {
        $input = $request->all();

        $configs = $this->configRepository->create($input);

        return $this->sendResponse($configs->toArray(), 'Config saved successfully');
    }

    /**
     * Display the specified config.
     * GET|HEAD /configs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var config $config */
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            return $this->sendError('Config not found');
        }

        return $this->sendResponse($config->toArray(), 'Config retrieved successfully');
    }

    /**
     * Update the specified config in storage.
     * PUT/PATCH /configs/{id}
     *
     * @param  int $id
     * @param UpdateconfigAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateconfigAPIRequest $request)
    {
        $input = $request->all();

        /** @var config $config */
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            return $this->sendError('Config not found');
        }

        $config = $this->configRepository->update($input, $id);

        return $this->sendResponse($config->toArray(), 'config updated successfully');
    }

    /**
     * Remove the specified config from storage.
     * DELETE /configs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var config $config */
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            return $this->sendError('Config not found');
        }

        $config->delete();

        return $this->sendResponse($id, 'Config deleted successfully');
    }
}
