<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Call;
use CampoLimpo\CallSector;
use CampoLimpo\CallService;
use CampoLimpo\Service;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = Call::orderBy('id', 'DESC')->get();
        $system = System::where('id', 1)->first();
        $users = User::orderBy('name')->get();
        $services = Service::orderBy('title')->get();
        $call_services = CallService::all();
        $sectors = CallSector::all();

        return view('admin.calls.index', [
            'calls' => $calls,
            'system' => $system,
            'users' => $users,
            'services' => $services,
            'call_services' => $call_services,
            'sectors' => $sectors
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
        $system = System::where('id', 1)->first();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        return view('admin.calls.create', [
            'users' => $users,
            'system' => $system,
            'selected_user' => (!empty($user) ? $user : null)
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

        if ((empty($request->user)) and empty($request->name)) {
            return redirect()->route('admin.calls.create', [
                'message' => 'Ooops'
            ])->with(['color' => 'red', 'message' => 'Escolha ou cadastre um cliente!']);
        }

        if ((empty($request->user)) and !empty($request->name)) {
            $userCreate = User::create($request->all());
            $user = $userCreate->id;
            $userCreate->client = 1;
            $userCreate->save();
        }

        if ((!empty($request->user)) and empty($request->name)) {
            $user = $request->user;
        }

        $call = new Call;
        $call->user = $user;
        $call->password = $request->password;
        $call->status = 0;

        $call->save();

        return redirect()->route('admin.calls.edit', [
            'call' => $call->id
        ])->with(['color' => 'green', 'message' => 'Atendimento iniciado com sucesso!']);

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
    public function edit(Request $request,$id)
    {
        $call = Call::where('id', $request->call)->first();
        $user = User::where('id', $call->user)->first();
        $system = System::where('id', 1)->first();
        $call_services = CallService::where('call', $call->id)->get();
        $services = Service::where('id', $call_services->service)->orderBy('title')->get();

        return view('admin.calls.edit', [
            'call' => $call,
            'system' => $system,
            'user' => $user,
            'services' => $services,
            'call_services' => $call_services
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
        $updateCall = Call::where('id', $id)->first();
        $updateCall->fill($request->all());
        $updateCall->save();

        // Relacionamento Serviços com Atendimento
        if (!empty($request->input('services'))) {
            $ids = $request->input('services');
            $services_ids = [];
            foreach ($ids as $service_id) {
                $attributes = [];
                $services_ids[$service_id] = $attributes;
            }
            $updateCall->services()->sync($services_ids);
        }

        return redirect()->route('admin.calls.edit', [
            'call' => $updateCall->id
        ])->with(['color' => 'green', 'message' => 'Atendimento atualizado com sucesso!']);
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
