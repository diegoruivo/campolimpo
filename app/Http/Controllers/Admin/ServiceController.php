<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Service;
use CampoLimpo\ServiceCategory;
use CampoLimpo\Http\Requests\Admin\Service as ServiceRequest;
use CampoLimpo\System;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $system = System::where('id', 1)->first();

        return view('admin.services.index', [
            'services' => $services,
            'system' => $system
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $services_categories = ServiceCategory::orderBy('title')->get();
        $system = System::where('id', 1)->first();

        if (!empty($request->service_category)) {
            $service_category = ServiceCategory::where('id', $request->service_category)->first();
        }

        return view('admin.services.create', [
            'services_categories' => $services_categories,
            'system' => $system,
            'selected' => (!empty($service_category) ? $service_category : null)

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $createService = Service::create($request->all());

        return redirect()->route('admin.services.edit', [
            'service' => $createService->id
        ])->with(['color' => 'green', 'message' => 'Serviço cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::where('id', $id)->first();
        $services_categories = ServiceCategory::orderBy('title')->get();
        $system = System::where('id', 1)->first();

        if (!empty($request->service)) {
            $service_category = ServiceCategory::where('id', $request->service)->first();
        }

        return view('admin.services.edit', [
            'service' => $service,
            'services_categories' => $services_categories,
            'system' => $system,
            'selected' => (!empty($service) ? $service : null)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateService = Service::where('id', $id)->first();
        $updateService->fill($request->all());
        $updateService->save();

        return redirect()->route('admin.services.edit', [
            'service' => $updateService->id
        ])->with(['color' => 'green', 'message' => 'Serviço atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
