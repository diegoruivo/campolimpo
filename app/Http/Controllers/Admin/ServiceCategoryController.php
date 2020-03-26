<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\ServiceCategory;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services_categories = ServiceCategory::all();

        return view('admin.service_category.index', [
            'services_categories' => $services_categories
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createServiceCategory= new ServiceCategory();
        $createServiceCategory->cover = $request->file('cover')->store('services' . $createServiceCategory->id);

        $createServiceCategory->title = $request->title;
        $createServiceCategory->description = $request->description;
        $createServiceCategory->save();

        return redirect()->route('admin.service_category.edit', [
            'service_category' => $createServiceCategory->id
        ])->with(['color' => 'green', 'message' => 'Categoria de Serviços cadastrada com sucesso!']);
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

        $services_categories = ServiceCategory::where('id', $id)->first();

        return view('admin.service_category.edit', [
            'services_categories' => $services_categories
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

        $updateServiceCategory = ServiceCategory::where('id', $id)->first();
        $updateServiceCategory->fill($request->all());
        $updateServiceCategory->save();


        if (!empty($request->file('cover'))) {
            $updateServiceCategory->cover= $request->file()['cover']->store('service_category' . $updateServiceCategory->id);
        }
        $updateServiceCategory->save();


        return redirect()->route('admin.service_category.edit', [
            'service_category' => $updateServiceCategory->id
        ])->with(['color' => 'green', 'message' => 'Categoria de Serviços atualizada com sucesso!']);


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
