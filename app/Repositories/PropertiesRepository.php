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

    public function destroy($id)
    {
        $this->properties->findOrFail($id)->delete();
    }

}