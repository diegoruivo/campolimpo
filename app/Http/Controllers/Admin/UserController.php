<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Document;
use CampoLimpo\DocumentCategory;
use CampoLimpo\Http\Requests\Admin\User as UserRequest;
use CampoLimpo\Support\Cropper;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function team()
    {
        $users = User::where('admin', 1)->get();
        return view('admin.users.team', [
            'users' => $users
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $userCreate = User::create($request->all());

        if(!empty($request->file('cover'))){
            $userCreate->cover = $request->file('cover')->store('user');
            $userCreate->save();
        }

        return redirect()->route('admin.users.edit', [
            'user' => $userCreate->id
        ])->with(['color' => 'green', 'message' => 'Cliente cadastrado com sucesso!']);

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
        $user = User::where('id', $id)->first();
        $documents_user = Document::where('user', $user->id)->first();
        $documents_categories = DocumentCategory::all();


        return view('admin.users.edit', [
            'user' => $user,
            'documents_user' => $documents_user,
            'documents_categories' => $documents_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->setSmallRuralProducerAttribute($request->small_rural_producer);
        $user->setMediumRuralProducerAttribute($request->medium_rural_producer);
        $user->setLargeRuralProducerAttribute($request->large_rural_producer);

        if(!empty($request->file('cover'))) {
            Storage::delete($user->cover);
            Cropper::flush($user->cover);
            $user->cover = '';
        }

        $user->fill($request->all());

        if(!empty($request->file('cover'))){
            $user->cover = $request->file('cover')->store('user');
        }

        if (!$user->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.users.edit', [
            'user' => $user->id
        ])->with(['color' => 'green', 'message' => 'Cliente atualizado com sucesso!']);

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
