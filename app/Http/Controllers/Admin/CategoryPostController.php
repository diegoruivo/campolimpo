<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\CategoryPost;
use CampoLimpo\System;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category_post = CategoryPost::all();
        $system = System::where('id', 1)->first();

        return view('admin.category_post.index', [
            'categories_post' => $category_post,
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

        return view('admin.category_post.create', [
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
        $categoryCreate = CategoryPost::create($request->all());

        return redirect()->route('admin.categories_post.edit', [
            'category_post' => $categoryCreate->id
        ])->with(['color' => 'green', 'message' => 'Categoria do Blog cadastrada com sucesso!']);
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
        $category_post = CategoryPost::where('id', $id)->first();
        $system = System::where('id', 1)->first();

        return view('admin.category_post.edit',[
            'category_post' => $category_post,
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
        $updateCategoryPost= CategoryPost::where('id', $id)->first();
        $updateCategoryPost->fill($request->all());
        $updateCategoryPost->save();

        return redirect()->route('admin.categories_post.edit', [
            'category_post' => $updateCategoryPost->id
        ])->with(['color' => 'green', 'message' => 'Categoria do Blog atualizada com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $destroyCategoryPost = CategoryPost::destroy($id);

        return redirect()->route('admin.categories_post.index', [
            'category_post' => $id
        ])->with(['color' => 'green', 'message' => 'Categoria do Blog excluída com sucesso!']);
    }
}
