<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
			'usuario' => [
				'required',
            ],
            'password' => [
                'required'
			],
        ]);
        
        if (Auth::attempt(['usuario' => $request->input('usuario'), 'password' => $request->input('password')])) {
                return redirect('/home');
        }else{
            // Caso a senhas não correspondam adiciona mensagem de erro para retorno
            //$statusmessage['password'] ="<script>alert(' Senha não corresponde') </script>" ;
            //$request->session()->flash('status', $statusmessage);
            $errors = ['usuario' => ['message' => 'Usuário ou senha incorreto'], 'password' => ['message' => "Usuário ou senha incorreto"]];
            return redirect('/login')->withErrors($errors)->withInput();
        }
    }
}
