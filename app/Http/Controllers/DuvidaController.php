<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Duvida;
use Illuminate\Support\Facades\Auth;

class DuvidaController extends Controller
{
 
    public function listarDuvida() {
        $usuario = Auth::id();
        $dados['duvidas'] = Duvida::where('usuario_id',$usuario)->get();
        return view('duvida/listarDuvidas', $dados);
    }

    public function listarDuvidasPorChatbot(Request $request, $idChatbot){
        $dados['duvidas'] = Duvida::where('chatbot_id', $idChatbot)->get();
        return view('duvida/listarDuvidas', $dados);
    }

    public function cadastrarDuvida(Request $request){
        $autor = Auth::id();
        $idchatbot = $request->session()->get("botUtilizado");
        $request->merge([
            'usuario_id' => $autor,
            'chatbot_id' => $idchatbot
        ]);
        $request->validate([
                'descricao_duvida' => 'required',
                'usuario_id' => 'required',
                'chatbot_id' => 'required'
                ]);
                Duvida::create($request->all());
                
        return redirect()->route('home')->with('acao','Duvida cadastrada com sucesso!');
     }

     public function atenderDuvida($idDuvida){
        $duvida = Duvida::find($idDuvida);
        $duvida->atendida = true;
        $duvida->save();
        return redirect()->route('chatbot.listar')->with('acao','Duvida cadastrada com sucesso!');
     }

     public function redirecionarTelaCadastro(){
        $dados['materias'] = Materia::all();
        return view('duvida/cadastrarDuvida', $dados);
    }
}
