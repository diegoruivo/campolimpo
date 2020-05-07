<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Attendance;
use CampoLimpo\Call;
use CampoLimpo\CallService;
use CampoLimpo\Contract;
use CampoLimpo\Service;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $call = Call::where('id', $request->attendance)->first();
        $user = User::where('id', $call->user)->first();
        $system = System::where('id', 1)->first();
        $services = Service::orderBy('title')->get();
        $call_services = CallService::where('call', $call->id)->get();
        $ncalls = Call::where('user', $user->id)->count();
        $ncontracts = Contract::where('user', $user->id)->count();

        return view('admin.attendances.edit', [
            'call' => $call,
            'system' => $system,
            'user' => $user,
            'services' => $services,
            'call_services' => $call_services,
            'ncalls' => $ncalls,
            'ncontracts' => $ncontracts
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

        $updateCall = Call::where('id', $request->attendance)->first();
        $updateCall->fill($request->all());
        $updateCall->provider = Auth::user()->id;
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

            return redirect()->route('admin.contracts.create', [
                'call' => $updateCall->id
            ])->with(['color' => 'green', 'message' => 'Atendimento do Setor atualizado com sucesso! Agora especifique o contrato.']);


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
