<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\ProjectInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    protected $project;

    public function __construct(ProjectInterface $project)
    {
        $this->project = $project;
    }

    public function index()
    {
        $projects = $this->project->all();
        return view('admin.project.index',compact('projects'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
