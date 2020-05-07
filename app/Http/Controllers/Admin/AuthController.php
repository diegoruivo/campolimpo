<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Buttons;
use CampoLimpo\Call;
use CampoLimpo\Contract;
use CampoLimpo\Post;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // PARA RESETAR SENHA DO USUÁRIO ID 1 - SENHA: 123
//        $user = User::where('id', 1)->first();
//        $user->password = '123';
//        $user->save();

        $system = System::where('id', 1)->first();

        if(Auth::check() === true) {
            return redirect()->route('admin.home');
        }
        return view('admin.index', [
            'system' => $system
        ]);
    }

    public function home()
    {
        $system = System::where('id', 1)->first();
        $buttons = Buttons::orderBy('position', 'ASC')->get();
        $nclients = User::where('client', 1)->count();
        $ncalls = Call::all()->count();
        $calls = Call::all();

        $posts = Post::orderBy('id', 'DESC')->get();

        return view('admin.dashboard', [
            'system' => $system,
            'buttons' => $buttons,
            'calls' => $calls,
            'ncalls' => $ncalls,
            'nclients' => $nclients,
            'posts' => $posts
        ]);

    }

    public function login(Request $request)
    {

        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Ooops, informe todos os dados para efetuar o login')->render();
            return response()->json($json);
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Ooops, informe um e-mail válido')->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error('Ooops, usuário e senha não conferem')->render();
            return response()->json($json);
        }

        $this->authenticated($request->getClientIp());
        $json['redirect'] = route('admin.home');
        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);
    }

}
