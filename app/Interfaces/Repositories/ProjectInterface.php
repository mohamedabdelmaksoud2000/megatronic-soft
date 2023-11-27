<?php

namespace App\Interfaces\Repositories;

interface ProjectInterface 
{

    public function all();
    public function paginate(int $paginate);
    public function find(string $id);
    public function create($request);
    public function update( $request , string $id );
    public function delete(string $id);

}