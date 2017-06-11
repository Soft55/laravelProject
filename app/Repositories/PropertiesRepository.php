<?php

namespace App\Repositories;

use App\Properties;

class PropertiesRepository
{

    protected $properties;

    public function __construct(Properties $properties)
    {
        $this->properties = $properties;
    }

    private function save(Properties $properties, Array $inputs)
    {
        $properties->longitude = $inputs['longitude'];
        $properties->latitude = $inputs['latitude'];

        $properties->save();
    }

    public function getPaginate($n)
    {
        return $this->properties->with('user')
            ->orderBy('properties.created_at', 'desc')
            ->paginate($n);
    }

    public function store($inputs)
    {
        $this->properties->create($inputs);
    }

    public function getById($id)
    {
        return $this->properties->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $this->properties->findOrFail($id)->delete();
    }

}