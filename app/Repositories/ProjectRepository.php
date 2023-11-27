<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ProjectInterface;
use App\Models\Project;

class ProjectRepository implements ProjectInterface
{

    protected $project ;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function all()
    {
        $projects = $this->project->all();
        return $projects;
    }

    public function paginate(int $paginate = 10)
    {
        $projects = $this->project->paginate($paginate);
        return $projects ;
    }

    public function find(string $id)
    {
        $project = $this->project->find($id);
        return $project ;
    }

    public function create($request)
    {
        $project = $this->project->create($request->all());
        return $project ;
    }

    public function update($request , $id)
    {
        $project = $this->find($id);
        $project->update($request->all());
        return $project ;
    }

    public function delete(string $id)
    {
        $project = $this->find($id);
        
        $project->delete();
        return 1 ;
    }

}