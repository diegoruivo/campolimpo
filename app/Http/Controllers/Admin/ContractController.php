<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Call;
use CampoLimpo\CallSector;
use CampoLimpo\CallService;
use CampoLimpo\Contract;
use CampoLimpo\Document;
use CampoLimpo\DocumentCategory;
use CampoLimpo\Http\Requests\Admin\Contract as ContractRequest;
use CampoLimpo\Order;
use CampoLimpo\Service;
use CampoLimpo\System;
use CampoLimpo\Term;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contracts = Contract::all();
        $system = System::where('id', 1)->first();

        return view('admin.contracts.index', [
            'contracts' => $contracts,
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
        $call = Call::where('id', $request->call)->first();
        $user = User::where('id', $call->user)->first();
        $system = System::where('id', 1)->first();
        $services = Service::orderBy('title')->get();
        $ncalls = Call::where('user', $user->id)->count();
        $ncontracts = Contract::where('user', $user->id)->count();

        $call_services = $call->services()->get();

        return view('admin.contracts.create', [
            'call' => $call,
            'user' => $user,
            'services' => $services,
            'call_services' => $call_services,
            'ncalls' => $ncalls,
            'ncontracts' => $ncontracts,
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
        $call = Call::where('id', $request->call)->first();
        $user = User::where('id', $call->user)->first();
        $services = Service::orderBy('title')->get();
        $call_services = $call->services()->get();

        if (!empty($call->services()->get())) {
            foreach ($call->services()->get() as $service) {

                $createContract = new Contract();
                $createContract->service = $service->id;
                $createContract->user = $user->id;
                $createContract->call = $call->id;
                $createContract->provider = Auth::user()->id;
                $createContract->contract_price = $service->price;
                $createContract->pay_day = $request->pay_day;
                $createContract->deadline = $request->deadline;
                $createContract->start_date = $request->start_date;
                $createContract->description = $request->description;
                $createContract->status = 0;
                $createContract->term = $service->term;
                $createContract->save();

                    $updateCall = Call::where('id', $call->id)->first();
                    $updateCall->fill($request->all());
                    $updateCall->status = 2;
                    $updateCall->save();

                    $createOrder = new Order();
                    $createOrder->contract = $createContract->id;
                    $createOrder->user = $createContract->user;
                    $createOrder->service = $createContract->service;
                    $createOrder->status = 0;
                    $createOrder->save();

                unset($createOrder);
                unset($createContract);
            }
        }

        return redirect()->route('admin.contracts.index');
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
        $contract = Contract::where('id', $id)->first();
        $call = Call::where('id', $contract->call)->first();
        $user = User::where('id', $call->user)->first();
        $system = System::where('id', 1)->first();
        $service = Service::where('id', $contract->service)->first();
        $term = Term::where('id', $service->term)->first();
        $ncalls = Call::where('user', $user->id)->count();
        $ncontracts = Contract::where('user', $user->id)->count();

        $call_services = $call->services()->get();

        return view('admin.contracts.edit', [
            'contract' => $contract,
            'call' => $call,
            'user' => $user,
            'service' => $service,
            'term' => $term,
            'call_services' => $call_services,
            'ncalls' => $ncalls,
            'ncontracts' => $ncontracts,
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
        $updateContract= Contract::where('id', $id)->first();
        $updateContract->fill($request->all());
        $updateContract->save();
        $updateContract->description = $request->description;
        $updateContract->terms = $request->terms;
        $updateContract->save();

        return redirect()->route('admin.contracts.edit', [
            'contract' => $updateContract->id
        ])->with(['color' => 'green', 'message' => 'Contrato atualizado com sucesso!']);
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
