<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ServiceInterface;
use App\Models\Service;

class ServiceRepository implements ServiceInterface
{

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function all()
    {
        $services = $this->service->all();
        return $services;
    }

    public function paginate(int $paginate = 10)
    {
        $services = $this->service->paginate($paginate);
        return $services;
    }

    public function find(string $id)
    {
        return $this->service->find($id);
    }

    public function create($request)
    {
        $service = $this->service->create($request->all());
        return $service ; 
    }

    public function update($request, string $id)
    {
        $service = $this->find($id);
        $service->update($request->all());
        return $service;
    }

    public function delete(string $id)
    {
        $service = $this->find($id);
        $service->delete();
        return 1;
    }

}