<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\CallSector;
use CampoLimpo\Document;
use CampoLimpo\DocumentCategory;
use CampoLimpo\Service;
use CampoLimpo\ServiceDocument;
use CampoLimpo\ServicesCallSector;
use CampoLimpo\ServiceCategory;
use CampoLimpo\Http\Requests\Admin\Service as ServiceRequest;
use CampoLimpo\ServiceSector;
use CampoLimpo\System;
use CampoLimpo\Term;
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
        $sectors = CallSector::all();
        $terms = Term::all();
        $documents_categories = DocumentCategory::all();

        if (!empty($request->service_category)) {
            $service_category = ServiceCategory::where('id', $request->service_category)->first();
        }

        if (!empty($request->term)) {
            $term = Term::where('id', $request->term)->first();
        }

        return view('admin.services.create', [
            'services_categories' => $services_categories,
            'sectors' => $sectors,
            'terms' => $terms,
            'documents_categories' => $documents_categories,
            'system' => $system,
            'selected' => (!empty($service_category) ? $service_category : null),
            'selected_term' => (!empty($term) ? $term: null)

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

        // Relacionamento Serviços com Setores
        if (!empty($request->input('sectors'))) {
            $ids = $request->input('sectors');
            $sectors_ids = [];
            foreach ($ids as $sectors_id) {
                $attributes = [];
                $sectors_ids[$sectors_id] = $attributes;
            }
            $createService->sectors()->sync($sectors_ids);
        }

        // Relacionamento Serviços com Documentos
        if (!empty($request->input('documents_categories'))) {
            $idsDocument = $request->input('documents_categories');
            $document_ids = [];
            foreach ($idsDocument as $documents_id) {
                $attributesDocument = [];
                $documents_ids[$documents_id] = $attributesDocument;
            }
            $createService->documents_categories()->sync($documents_ids);
        }

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
        $sectors = CallSector::all();
        $sector_services = ServicesCallSector::where('service', $service->id)->get();
        $service_documents = ServiceDocument::where('service', $service->id)->get();
        $system = System::where('id', 1)->first();
        $terms = Term::all();
        $documents_categories = DocumentCategory::all();

        return view('admin.services.edit', [
            'service' => $service,
            'services_categories' => $services_categories,
            'sectors' => $sectors,
            'terms' => $terms,
            'documents_categories' => $documents_categories,
            'sector_services' => $sector_services,
            'service_documents' => $service_documents,
            'system' => $system,
            'selected' => (!empty($service) ? $service : null),
            'selected_term' => (!empty($term) ? $term : null)
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

        // Relacionamento Serviços com Setores
        if (!empty($request->input('sectors'))) {
            $ids = $request->input('sectors');
            $sectors_ids = [];
            foreach ($ids as $sectors_id) {
                $attributes = [];
                $sectors_ids[$sectors_id] = $attributes;
            }
            $updateService->sectors()->sync($sectors_ids);
        }

        // Relacionamento Serviços com Documentos
        if (!empty($request->input('documents_categories'))) {
            $idsDocument = $request->input('documents_categories');
            $document_ids = [];
            foreach ($idsDocument as $documents_id) {
                $attributesDocument = [];
                $documents_ids[$documents_id] = $attributesDocument;
            }
            $updateService->documents_categories()->sync($documents_ids);
        }

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
