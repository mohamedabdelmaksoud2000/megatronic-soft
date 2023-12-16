<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TechInterface;
use App\Models\Tech;

class TechRepository implements TechInterface
{

    protected $tech ;

    public function __construct(Tech $tech)
    {
        $this->tech = $tech;
    }

    public function all()
    {
        $techs = $this->tech->all();
        return $techs;
    }

    public function paginate(int $paginate = 10)
    {
        $techs = $this->tech->paginate($paginate);
        return $techs;
    }

    public function find(string $id)
    {
        return $this->tech->find($id);
    } 

    public function create($request)
    {
        $tech = $this->tech->create($request->all());
        return $tech;
    }

    public function update($request, string $id)
    {
        $tech = $this->find($id);
        $tech->update($request->all());
        return $tech;
    }

    public function delete(string $id)
    {
        $tech = $this->find($id);
        $tech->delete();
        return 1 ;
    }

}