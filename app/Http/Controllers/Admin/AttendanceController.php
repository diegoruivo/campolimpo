<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Attendance;
use CampoLimpo\AttendanceService;
use CampoLimpo\Call;
use CampoLimpo\CallService;
use CampoLimpo\Contract;
use CampoLimpo\Service;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Database\QueryException;
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
        $attendances = Attendance::where('status', 1)->get();
        $system = System::where('id', 1)->first();

        return view('admin.attendances.index', [
            'system' => $system,
            'attendances' => $attendances
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

        return view('admin.attendances.create', [
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
            return redirect()->route('admin.attendances.create', [
                'message' => 'Ooops'
            ])->with(['color' => 'red', 'message' => 'Escolha ou cadastre um cliente!']);
        }

        if ((empty($request->user)) and !empty($request->name)) {
            try {
                $userCreate = User::create($request->all());
                $user = $userCreate->id;
                $userCreate->client = 1;
                $userCreate->save();
            } catch (QueryException $exception)
            {
                return redirect()->route('admin.attendances.create', [
                    'message' => 'Ooops'
                ])->with(['color' => 'red', 'message' => 'O e-mail já está cadastrado!']);
            }
            if (!$userCreate->save()) {
                return redirect()->back()->withInput()->withErrors();
            }
        }


        if ((!empty($request->user)) and empty($request->name)) {
            $user = $request->user;
        }

        $attendance = new Attendance;
        $attendance->user = $user;
        $attendance->password = $request->password;
        $attendance->status = 0;
        $attendance->provider = Auth::user()->id;

        $attendance->save();

        return redirect()->route('admin.attendances.edit', [
            'attendance' => $attendance->id
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
    public function edit(Request $request, $id)
    {
        $attendance = Attendance::where('id', $request->attendance)->first();
        $user = User::where('id', $attendance->user)->first();
        $system = System::where('id', 1)->first();
        $services = Service::orderBy('title')->get();
        $attendance_services = AttendanceService::where('attendance', $attendance->id)->get();
        $ncalls = Call::where('user', $user->id)->count();
        $ncontracts = Contract::where('user', $user->id)->count();

        return view('admin.attendances.edit', [
            'attendance' => $attendance,
            'system' => $system,
            'user' => $user,
            'services' => $services,
            'attendance_services' => $attendance_services,
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

        $updateAttendance = Attendance::where('id', $request->attendance)->first();
        $updateAttendance->fill($request->all());
        $updateAttendance->provider = Auth::user()->id;
        $updateAttendance->status = 1;
        $updateAttendance->save();

        // Relacionamento Serviços com Atendimento
        if (!empty($request->input('services'))) {
            $ids = $request->input('services');
            $services_ids = [];
            foreach ($ids as $service_id) {
                $attributes = [];
                $services_ids[$service_id] = $attributes;
            }
            $updateAttendance->services()->sync($services_ids);
        }

            return redirect()->route('admin.attendances.edit', [
                'attendance' => $updateAttendance->id
            ])->with(['color' => 'green', 'message' => 'Atendimento encaminhado para a Fila de Atendimento!']);


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
