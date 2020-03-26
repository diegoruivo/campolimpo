<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\DocumentCategory;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class DocumentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents_categories = DocumentCategory::all();

        return view('admin.document_category.index', [
            'documents_categories' => $documents_categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.document_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $documentCategoryCreate = DocumentCategory::create($request->all());

        return redirect()->route('admin.document_category.edit', [
            'document_category' => $documentCategoryCreate->id
        ])->with(['color' => 'green', 'message' => 'Categoria de Documentos cadastrada com sucesso!']);

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
        $document_category = DocumentCategory::where('id', $id)->first();

        return view('admin.document_category.edit', [
            'document_category' => $document_category
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
        $document_category = DocumentCategory::where('id', $id)->first();
        $document_category->fill($request->all());
        $document_category->save();

        return redirect()->route('admin.document_category.edit', [
            'document_category' => $document_category->id
        ])->with(['color' => 'green', 'message' => 'Categoria de Documentos atualizada com sucesso!']);
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
