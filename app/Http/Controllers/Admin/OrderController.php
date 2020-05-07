<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Call;
use CampoLimpo\Contract;
use CampoLimpo\Order;
use CampoLimpo\Service;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $system = System::where('id', 1)->first();

        return view('admin.orders.index', [
            'orders' => $orders,
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
        $order = Order::where('id', $id)->first();
        $contract = Contract::where('id', $order->contract)->first();
        $call = Call::where('id', $contract->call)->first();
        $user = User::where('id', $call->user)->first();
        $system = System::where('id', 1)->first();
        $service = Service::where('id', $contract->service)->first();
        $ncalls = Call::where('user', $user->id)->count();
        $ncontracts = Contract::where('user', $user->id)->count();
        $providers = User::all();

        if (!empty($request->provider)) {
            $provider = User::where('id', $request->provider)->first();
        }

        return view('admin.orders.edit', [
            'order' => $order,
            'contract' => $contract,
            'call' => $call,
            'user' => $user,
            'service' => $service,
            'ncalls' => $ncalls,
            'ncontracts' => $ncontracts,
            'providers' => $providers,
            'system' => $system,
            'selected_provider' => (!empty($provider) ? $provider: null)
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


        $updateOrder = Order::where('id', $id)->first();
        $updateOrder->fill($request->only('provider'));
        $updateOrder->save();

        if (!empty($request->start_date)) { $updateOrder->start_date = $request->start_date; $updateOrder->save(); }
        if (!empty($request->start_time)) { $updateOrder->start_time= $request->start_time; $updateOrder->save(); }
        if (!empty($request->end_date)) { $updateOrder->end_date = $request->end_date; $updateOrder->save(); }
        if (!empty($request->end_time)) { $updateOrder->end_time = $request->end_time; $updateOrder->save(); }

        if (!empty($request->description)) { $updateOrder->description = $request->description; $updateOrder->save(); }
        if (!empty($request->status)) { $updateOrder->status = $request->status; $updateOrder->save(); }

        return redirect()->route('admin.orders.edit', [
            'order' => $updateOrder->id
        ])->with(['color' => 'green', 'message' => 'Ordem atualizada com sucesso!']);
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
