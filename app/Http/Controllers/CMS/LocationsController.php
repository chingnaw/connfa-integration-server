<?php

namespace App\Http\Controllers\CMS;

use App\Http\Requests\LocationRequest;
use App\Repositories\ConferenceRepository;
use App\Repositories\LocationRepository;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

/**
 * Class LocationsController
 * @package App\Http\Controllers\CMS
 */
class LocationsController extends Controller
{
    /**
     * @var LocationRequest|null
     */
    protected $request = null;

    /**
     * @var LocationRepository|null
     */
    protected $repository = null;

    /**
     * @var ResponseFactory|null
     */
    protected $response = null;

    /**
     * @var string
     *
     */
    protected $viewsFolder = 'locations';

    /**
     * @var string
     */
    protected $routeName = 'location';

    /**
     * LocationsController constructor.
     *
     * @param LocationRequest $request
     * @param LocationRepository $repository
     * @param ResponseFactory $response
     * @param ConferenceRepository $conferenceRepository
     */
    public function __construct(LocationRequest $request, LocationRepository $repository, ResponseFactory $response, ConferenceRepository $conferenceRepository)
    {
        $this->request = $request;
        $this->repository = $repository;
        $this->response = $response;

        $conferenceAlias = $request->route()->getParameter('conference_alias');
        $conference = $conferenceRepository->getByAlias($conferenceAlias);
        View::share('conference', $conference);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->view($this->getViewName('index'),
            ['data' => $this->repository->firstOrNew([])]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return $this->response->view($this->getViewName('edit'),
            ['data' => $this->repository->firstOrNew([])]);
    }

    /** Update the specified resource in storage.
     *
     * @param string $conferenceAlias
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($conferenceAlias)
    {
        $location = $this->repository->firstOrCreate();
        $this->repository->updateRich($this->request->except('_method', '_token'), $location->id);

        return $this->response->redirectToRoute($this->routeName . '.index', ['conference_alias' => $conferenceAlias]);
    }

    /**
     * Get view name
     *
     * @param string $viewName
     *
     * @return string
     */
    protected function getViewName($viewName)
    {
        return $this->viewsFolder . '.' . $viewName;
    }
}
