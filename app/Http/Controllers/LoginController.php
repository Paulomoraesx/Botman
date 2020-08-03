<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function autenticar(Request $request){
        $request->validate([
            'login' => 'required',
            'senha' => 'required',
            ]);
        $user = Usuario::where('login, senha', $request->login, $request->senha);
        
        if($user->is_null){
            return redirect()->route('login')->with('Erro!','Senha ou Login invalido');
        }else{
            return redirect()->route('inicio');
        }
    }


    public function inicio(){
        return view('welcome');
    }
    public function login(){
        return view('login');
    }
    public function logout(){      
    }
    
    public function logon(Request $request){
        if($request->login== 'admin' && $request->senha== '12345')
            return redirect()->route('inicio');
        else
         return redirect()->route('login')->with('Erro!','Senha ou Login invalido');
    }
    public function cadastros(){
        return view('cadastros');
    }
    public function listagem(){
        return view('listagem');
    }
    public function venda(){
        return view('venda');
    }
    public function inicio1(){
        return view('welcome');
    }
    public function criandoChatBot(){
        return view('criandoChatBot');
    }
}
