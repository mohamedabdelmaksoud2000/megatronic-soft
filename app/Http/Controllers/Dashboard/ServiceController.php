<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Interfaces\Repositories\ServiceInterface;
use App\Models\Tech;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    protected $service ;

    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $services = $this->service->all();
        return view('admin.service.index',compact('services'));
    }

    public function create()
    {
        $techs = Tech::all();
        return view('admin.service.create',compact('techs'));
    }

    public function store(StoreServiceRequest $request)
    {
        $service = $this->service->create($request);
        $service->setImage($request);
        $service->teches()->attach($request->teches);
        toastr()->success('Service has been created successfully!');
        return redirect()->route('service.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $techs = Tech::all();
        $service = $this->service->find($id);
        return view('admin.service.update',compact(['techs','service']));
    }

    public function update(UpdateServiceRequest $request, string $id)
    {
        $service = $this->service->update($request,$id);
        $service->updateImage($request);
        $service->teches()->sync($request->teches);
        toastr()->success('Service has been updated successfully!');
        return redirect()->route('service.index');
    }

    public function destroy(Request $request)
    {
        $service = $this->service->find($request->id);
        $service->deleteImage();
        $service->teches()->detach();
        $service->delete();
        toastr()->success('Service has been deleted successfully!');
        return redirect()->route('service.index');
    }
}
