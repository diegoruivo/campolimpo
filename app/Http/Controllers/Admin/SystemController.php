<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\System;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class SystemController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $system = System::where('id', $id)->first();

        return view('admin.system.edit', [
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
        $system = System::where('id', $id)->first();
        $system->fill($request->all());
        $system->save();

        // Upload de Logo
        if (!empty($request->file('logo'))) {
            $system->logo = $request->file('logo')->store('system');
        }

        // Upload de Favico
        if (!empty($request->file('favico'))) {
            $system->favico = $request->file('favico')->store('system');
        }

        if (!$system->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.system.edit', [
            'system' => $system->id
        ])->with(['color' => 'green', 'message' => 'Configurações do sistema atualizadas com sucesso!']);
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
