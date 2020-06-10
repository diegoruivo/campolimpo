<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Attendance;
use CampoLimpo\AttendanceService;
use CampoLimpo\Buttons;
use CampoLimpo\Call;
use CampoLimpo\CallSector;
use CampoLimpo\CallService;
use CampoLimpo\Contract;
use CampoLimpo\Order;
use CampoLimpo\Post;
use CampoLimpo\Service;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        $buttons = Buttons::orderBy('position', 'ASC')->get();
        $nclients = User::where('client', 1)->count();
        $ncalls = Call::all()->count();
        $calls = Call::all();
        $contracts = Contract::all();
        $orders = Order::all();
        $posts = Post::orderBy('id', 'DESC')->get();

        return view('admin.calls.index', [
            'calls' => $calls,
            'system' => $system,
            'users' => $users,
            'services' => $services,
            'call_services' => $call_services,
            'sectors' => $sectors,

            'buttons' => $buttons,
            'calls' => $calls,
            'contracts' => $contracts,
            'orders' => $orders,
            'ncalls' => $ncalls,
            'nclients' => $nclients,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $attendance = Attendance::where('id', $request->attendance)->first();
        $user = User::where('id', $attendance->user)->first();
        $system = System::where('id', 1)->first();
        $services = Service::orderBy('title')->get();
        $attendance_services = AttendanceService::where('attendance', $attendance->id)->get();
        $ncalls = Call::where('user', $user->id)->count();
        $ncontracts = Contract::where('user', $user->id)->count();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        return view('admin.calls.create', [
            'attendance' => $attendance,
            'system' => $system,
            'user' => $user,
            'services' => $services,
            'attendance_services' => $attendance_services,
            'ncalls' => $ncalls,
            'ncontracts' => $ncontracts,
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



        $call = new Call;
        $call->user = $user;
        $call->status = 0;
        $call->provider = Auth::user()->id;

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
        $services = Service::orderBy('title')->get();
        $call_services = CallService::where('call', $call->id)->get();
        $ncalls = Call::where('user', $user->id)->count();
        $ncontracts = Contract::where('user', $user->id)->count();

        return view('admin.calls.edit', [
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
    public function update(Request $request, $id)
    {
        $updateCall = Call::where('id', $id)->first();
        $updateCall->fill($request->all());
        $updateCall->provider = Auth::user()->id;
        $updateCall->status = 1;
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

        return redirect()->route('admin.calls.index', [
            'call' => $updateCall->id
        ])->with(['color' => 'green', 'message' => 'Atendimento encaminhado com sucesso!']);
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
