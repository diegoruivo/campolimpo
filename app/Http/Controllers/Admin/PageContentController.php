<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\ContentImage;
use CampoLimpo\Page;
use CampoLimpo\PageContent;
use CampoLimpo\Support\Cropper;
use CampoLimpo\System;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $page = Page::where('id', $request->page)->first();
        $system = System::where('id', 1)->first();

        return view('admin.page_contents.create', [
            'page' => $page,
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
        $page = Page::where('id', $request->page)->first();

        $content = new PageContent;
        $content->page = $request->page;
        $content->title = $request->title;
        $content->subtitle = $request->subtitle;
        $content->description = $request->description;
        $content->position = $request->position;
        $content->status = $request->status;

        $content->save();

        $content = PageContent::where('id', $content->id)->first();

        if (!empty($request->allFiles())) {
            foreach ($request->allFiles()['files'] as $image) {
                $pageImage = new ContentImage();
                $pageImage->page = $page->id;
                $pageImage->content = $content->id;
                $pageImage->path = $image->store('pages/' . $page->id);
                $pageImage->save();
                unset($pageImage);
            }
        }

        return redirect()->route('admin.pages.edit', [
            'page' => $page->id
        ])->with(['color' => 'green', 'message' => 'Conteúdo cadastrado com sucesso!']);
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
        $content = PageContent::where('id', $request->page_content)->first();
        $page = Page::where('id', $content->page)->first();
        $system = System::where('id', 1)->first();

        return view('admin.page_contents.edit', [
            'content' => $content,
            'page' => $page,
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
    public function update(Request $request)
    {
        $updateContent= PageContent::where('id', $request->page_content)->first();
        $updateContent->fill($request->all());
        $updateContent->save();

        $page = Page::where('id', $updateContent->page)->first();

        if (!empty($request->allFiles())) {
            foreach ($request->allFiles()['files'] as $image) {
                $pageImage = new ContentImage();
                $pageImage->page = $page->id;
                $pageImage->content = $updateContent->id;
                $pageImage->path = $image->store('pages/' . $page->id);
                $pageImage->save();
                unset($pageImage);
            }
        }

        return redirect()->route('admin.pages.edit', [
            'page' => $page->id
        ])->with(['color' => 'green', 'message' => 'Conteúdo atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageContent $page_content)
    {
        $content = PageContent::where('id', $page_content->id)->first();
        $page = $content->page;
        $contentDestroy = PageContent::destroy($page_content->id);

        return redirect()->route('admin.pages.edit', [
            'page' => $page
        ])->with(['color' => 'green', 'message' => 'Conteúdo excluído com sucesso!']);
    }



    public function imageSetCover(Request $request)
    {
        $imageSetCover = ContentImage::where('id', $request->image)->first();
        $allImage = ContentImage::where('content', $imageSetCover->content)->get();

        foreach ($allImage as $image) {
            $image->cover = null;
            $image->save();
        }

        $imageSetCover->cover = true;
        $imageSetCover->save();

        $json = [
            'success' => true
        ];

        return response()->json($json);
    }

    public function imageRemove(Request $request)
    {
        $imageDelete= ContentImage::where('id', $request->image)->first();

        Storage::delete($imageDelete->path);
        Cropper::flush($imageDelete->path);
        $imageDelete->delete();

        $json = [
            'success' => true
        ];

        return response()->json($json);
    }


}
