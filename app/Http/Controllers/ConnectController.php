<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class ConnectController extends Controller
{

    public function __Construct(){
        $this->middleware('guest')->except(['getLogout']);
    }
    
    public function getLogin(){

        return view('login.login');

    }

    public function postLogin(Request $request){
       
        $rules = [
            'email' => 'required|email',
            'pass' => 'required|min:8',
        ];

        $messages = [
            'email.required' => 'El campo de correo es requerido',
            'pass.required' => 'El campo de contraseña es requerido',
            'pass.min' => 'La contraseña debe contener más de 8 caracteres',
            'email.email' => 'El campo de correo es invalido',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'se ha producido un error, Verifica los datos')->with('typealert', 'danger');
        else:

            if( Auth::attempt( ['email' => $request->input('email'), 'password' => $request->input('pass')], true ) ):
                
                if (Auth::user()->user_state == '100') {

                    return redirect('/logout')->with('message', 'Su usuario Fue bloqueado')->with('typealert', 'danger');    

                } else{
                   
                    return redirect('/');
                }
                        
            else:
                return back()->withErrors($validator)->with('message', 'Correo electrónico o contraseña incorrectos')->with('typealert', 'danger');
            endif;
      
        endif;
    }

    public function getLogout(){
        if (Auth::user() != null) {
            $status = Auth::user()->user_state;
            if ($status == '100') {
                Auth::logout();
                return redirect('/login')->with('message', 'Su usuario fue suspendido')->with('typealert', 'danger');
            } else{
                Auth::logout();
                return redirect('/login');
            }
        }else {
            Auth::logout();
            return redirect('/login');
        }
    }


}
