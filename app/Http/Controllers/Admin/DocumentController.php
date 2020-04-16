<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Document;
use CampoLimpo\DocumentCategory;
use CampoLimpo\Http\Requests\Admin\Documents as DocumentRequest;
use CampoLimpo\Property;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;


class DocumentController extends Controller
{

    public function forceDelete($document)
    {
       $document = Document::onlyTrashed()->where(['id' => $document])->forceDelete();

        return redirect()->route('admin.documents.trashed', [
            'document' => $document
        ]);
    }

    public function restore($document)
    {
        $document = Document::onlyTrashed()->where(['id' => $document])->first();

        if ($document->trashed()){
                $document->restore();
        }

        return redirect()->route('admin.documents.trashed', [
            'document' => $document->id
        ])->with(['color' => 'green', 'message' => 'Documento restaurado com sucesso!']);
    }

    public function trashed()
    {
        $documents = Document::onlyTrashed()->get();
        $system = System::where('id', 1)->first();

        return view('admin.documents.trashed', [
            'documents' => $documents,
            'system' => $system
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        $system = System::where('id', 1)->first();

        return view('admin.documents.index', [
            'documents' => $documents,
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
        $users = User::orderBy('name')->get();
        $documents_categories = DocumentCategory::orderBy('title')->get();
        $system = System::where('id', 1)->first();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        if (!empty($request->property)) {
            $properties = Property::where('id', $request->property)->get();
            $property = Property::where('id', $request->property)->first();
        } else {
            $properties = Property::all();
        }

        return view('admin.documents.create', [
            'users' => $users,
            'system' => $system,
            'properties' => $properties,
            'documents_categories' => $documents_categories,
            'selected_user' => (!empty($user) ? $user : null),
            'selected_property' => (!empty($property) ? $property : null)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        $documentCreate = new Document();
        $documentCreate->title = $request->title;
        $documentCreate->description = $request->description;
        $documentCreate->document = $request->document;
        $documentCreate->user = $request->user;
        $documentCreate->property = $request->property;
        $documentCreate->path = $request->file('path')->store('documents');
        $documentCreate->save();

        return redirect()->route('admin.documents.edit', [
            'document' => $documentCreate->id
        ])->with(['color' => 'green', 'message' => 'Documento cadastrado com sucesso!']);
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
        $document = Document::where('id', $id)->first();
        $users = User::orderBy('name')->get();
        $documents = Document::orderBy('id')->get();
        $documents_categories = DocumentCategory::orderBy('title')->get();
        $system = System::where('id', 1)->first();


        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        if (!empty($request->property)) {
            $properties = Property::where('id', $request->property)->get();
            $property = Property::where('id', $request->property)->first();
        } else {
            $properties = Property::all();
        }

        return view('admin.documents.edit', [
            'users' => $users,
            'system' => $system,
            'document' => $document,
            'documents' => $documents,
            'documents_categories' => $documents_categories,
            'properties' => $properties,
            'selected_user' => (!empty($user) ? $user : null),
            'selected_property' => (!empty($property) ? $property : null)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request, $id)
    {
        $updateDocument = Document::where('id', $id)->first();
        $updateDocument->fill($request->all());
        $updateDocument->save();

        if (!empty($request->file('path'))) {
            $updateDocument->path = $request->file()['path']->store('documents' . $updateDocument->id);
        }
        $updateDocument->save();

        return redirect()->route('admin.documents.edit', [
            'document' => $updateDocument->id
        ])->with(['color' => 'green', 'message' => 'Documento atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $destroyDocument = Document::destroy($document->id);

        return redirect()->route('admin.documents.index', [
            'document' => $document->id
        ])->with(['color' => 'green', 'message' => 'Documento excluído com sucesso!']);
    }
}
