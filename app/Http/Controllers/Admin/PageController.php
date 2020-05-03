<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\PageContent;
use CampoLimpo\Page;
use CampoLimpo\System;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        $system = System::where('id', 1)->first();

        return view('admin.pages.index', [
            'pages' => $pages,
            'system' => $system
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $system = System::where('id', 1)->first();

        return view('admin.pages.create', [
            'system' => $system
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createPage = Page::create($request->all());

        return redirect()->route('admin.pages.edit', [
            'page' => $createPage->id
        ])->with(['color' => 'green', 'message' => 'Página cadastrada com sucesso!']);
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
    public function edit(Request $request, $id)
    {
        $page = Page::where('id', $id)->first();
        $contents = PageContent::where('page', $page->id)->get();
        $system = System::where('id', 1)->first();

        return view('admin.pages.edit', [
            'page' => $page,
            'contents' => $contents,
            'system' => $system
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
        $updatePage = Page::where('id', $id)->first();
        $updatePage->fill($request->all());
        $updatePage->save();

        return redirect()->route('admin.pages.edit', [
            'page' => $updatePage->id
        ])->with(['color' => 'green', 'message' => 'Página atualizada com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $pageDestroy = Page::destroy($page->id);

        return redirect()->route('admin.pages.index', [
            'page' => $page
        ])->with(['color' => 'green', 'message' => 'Página excluída com sucesso!']);
    }
}
