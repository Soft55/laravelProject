<?php

namespace App\Http\Controllers;

use App\Properties;
use App\Repositories\PropertiesRepository;
use App\Http\Requests\PropertiesRequest;

class PropertiesController extends Controller
{

    protected $PropertiesRepository;

    protected $nbrPerPage = 4;

    public function __construct(PropertiesRepository $propertiesRepository)
    {
        $this->middleware('auth', ['except' => 'index']);

        $this->PropertiesRepository = $propertiesRepository;
    }

    public function index()
    {
        $properties = $this->PropertiesRepository->getPaginate($this->nbrPerPage);
        $links = $properties->render();

        return view('liste', compact('properties', 'links'));
    }

    public function create()
    {
        return view('add');
    }

    public function store(PropertiesRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

        $this->PropertiesRepository->store($inputs);

        return redirect(route('Properties.index'));
    }

    public function edit($id)
    {
        $properties = $this->PropertiesRepository->getById($id);

        return view('edit',  compact('properties'));
    }

    public function update(PropertiesRequest $request, $id)
    {
        $this->PropertiesRepository->update($id, $request->all());

        return redirect('properties');
    }

    public function destroy($id)
    {
        $this->PropertiesRepository->destroy($id);

        return redirect()->back();
    }

}