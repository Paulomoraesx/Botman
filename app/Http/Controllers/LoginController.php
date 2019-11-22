<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
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
}
