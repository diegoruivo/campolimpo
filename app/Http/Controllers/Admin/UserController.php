<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Account;
use CampoLimpo\Bank;
use CampoLimpo\CallSector;
use CampoLimpo\Dap;
use CampoLimpo\Document;
use CampoLimpo\DocumentCategory;
use CampoLimpo\Http\Requests\Admin\User as UserRequest;
use CampoLimpo\RuralEnvironmentalRegistry;
use CampoLimpo\RuralProperty;
use CampoLimpo\Support\Cropper;
use CampoLimpo\System;
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
        $system = System::where('id', 1)->first();


        return view('admin.users.index', [
            'users' => $users,
            'system' => $system
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
        $system = System::where('id', 1)->first();

        return view('admin.users.team', [
            'users' => $users,
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
        $sectors = CallSector::all();
        $system = System::where('id', 1)->first();

        return view('admin.users.create', [
            'sectors' => $sectors,
            'system' => $system
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $userCreate = User::create($request->all());

//        // Relacionamento Setores de Atendimento e Usuários
//        if (!empty($request->input('sectors'))) {
//            $ids = $request->input('sectors');
//            $sector_ids = [];
//            foreach ($ids as $sector_id) {
//                $attributes = [];
//                $sector_ids[$sector_id] = $attributes;
//            }
//            $userCreate->sectors()->sync($sector_ids);
//        }

        if (!empty($request->file('cover'))) {
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $system = System::where('id', 1)->first();
        $documents_user = Document::where('user', $user->id)->first();
        $documents_categories = DocumentCategory::all();
        $sectors = CallSector::all();
        $accounts = Account::where('user', $user->id)->get();
        $banks = Bank::orderBy('bank')->get();
        $rural_properties = RuralProperty::where('user', $user->id)->get();
        $daps = Dap::where('user', $user->id)->get();
        $rural_environmental_registrations = RuralEnvironmentalRegistry::where('user', $user->id)->get();

//        if (!empty($request->sector)) {
//            $sector = User::where('id', $request->sector)->first();
//        }

        return view('admin.users.edit', [
            'user' => $user,
            'system' => $system,
            'documents_user' => $documents_user,
            'documents_categories' => $documents_categories,
            'sectors' => $sectors,
            'accounts' => $accounts,
            'banks' => $banks,
            'rural_properties' => $rural_properties,
            'daps' => $daps,
            'rural_environmental_registrations' => $rural_environmental_registrations,
            'selected' => (!empty($sector) ? $sector : null)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->setSmallRuralProducerAttribute($request->small_rural_producer);
        $user->setMediumRuralProducerAttribute($request->medium_rural_producer);
        $user->setLargeRuralProducerAttribute($request->large_rural_producer);

//        // Relacionamento Setores de Atendimento e Usuários
//        if (!empty($request->input('sectors'))) {
//            $ids = $request->input('sectors');
//            $sector_ids = [];
//            foreach ($ids as $sector_id) {
//                $attributes = [];
//                $sector_ids[$sector_id] = $attributes;
//            }
//            $user->sectors()->sync($sector_ids);
//        }


        // Upload de Imagem
        if (!empty($request->file('cover'))) {
            Storage::delete($user->cover);
            // Cropper::flush($user->cover);
            $user->cover = '';
        }



        $user->fill($request->all());

        if (!empty($request->file('cover'))) {
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
