<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\CategoryPost;
use CampoLimpo\Post;
use CampoLimpo\PostImage;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        $system = System::where('id', 1)->first();

        return view('admin.posts.index',[
            'posts' => $posts,
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
        $system = System::where('id', 1)->first();
        $categories_post = \CampoLimpo\CategoryPost::all();

        if (!empty($request->category)) {
            $categories_post = CategoryPost::where('id', $request->category)->get();
            $category = CategoryPost::where('id', $request->category)->first();
        } else {
            $categories_post = CategoryPost::all();
        }

        return view('admin.posts.create',[
            'system' => $system,
            'categories_post' => $categories_post,
            'selected' => (!empty($category) ? $category: null),

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
        $author = User::where('id', Auth::user()->id)->first();
        $category = CategoryPost::where('id', $request->category)->first();

        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->author = $author->id;
        $post->category = $category->id;

        $post->save();

        if (!empty($request->allFiles())) {
            foreach ($request->allFiles()['files'] as $image) {
                $postImage = new PostImage();
                $postImage->post = $post->id;
                $postImage->path = $image->store('posts/' . $post->id);
                $postImage->save();
                unset($postImage);
            }
        }

        return redirect()->route('admin.posts.edit', [
            'post' => $post->id
        ])->with(['color' => 'green', 'message' => 'Post cadastrado com sucesso!']);
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
        $post = Post::where('id', $id)->first();
        $categories_post = \CampoLimpo\CategoryPost::all();
        $system = System::where('id', 1)->first();

        return view('admin.posts.edit',[
            'post' => $post,
            'categories_post' => $categories_post,
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
        $updatePost= Post::where('id', $id)->first();
        $updatePost->fill($request->all());
        $updatePost->save();

        if (!empty($request->allFiles())) {
            foreach ($request->allFiles()['files'] as $image) {
                $postImage = new PostImage();
                $postImage->post = $updatePost->id;
                $postImage->path = $image->store('posts/' . $updatePost->id);
                $postImage->save();
                unset($postImage);
            }
        }

        return redirect()->route('admin.posts.edit', [
            'post' => $updatePost->id
        ])->with(['color' => 'green', 'message' => 'Post atualizado com sucesso!']);
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
