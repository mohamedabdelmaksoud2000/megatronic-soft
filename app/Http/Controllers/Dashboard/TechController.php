<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechRequest;
use App\Http\Requests\UpdateTechRequest;
use App\Interfaces\Repositories\TechInterface;
use Illuminate\Http\Request;

class TechController extends Controller
{

    protected $tech ; 

    public function __construct(TechInterface $tech)
    {
        $this->tech = $tech;
    }

    public function index()
    {
        $techs = $this->tech->all();
        return view('admin.tech.index',compact('techs'));
    }

    public function create()
    {
        return view('admin.tech.create');
    }

    public function store(StoreTechRequest $request)
    {
        $tech = $this->tech->create($request->safe());
        $tech->setImage($request);
        toastr()->success('technology has been created successfully!');
        return redirect()->route('tech.index');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $tech = $this->tech->find($id);
        return view('admin.tech.update',compact('tech'));
    }

    public function update(UpdateTechRequest $request, string $id)
    {
        $tech = $this->tech->update($request,$id);
        $tech->updateImage($request);
        toastr()->success('technology has been updated successfully!');
        return redirect()->route('tech.index');
    }

    public function destroy(Request $request)
    {
        $tech = $this->tech->find($request->id);
        $tech->deleteImage();
        $tech->delete();
        toastr()->success('Technology has been deleted successfully!');
        return redirect()->route('tech.index');
    }
}
