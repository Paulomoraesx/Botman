<?php

namespace App\Http\Controllers;

use App\Chatbot;
use App\Models\Materia;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChatbotController extends Controller
{
    public function redirecionarParaTelaDeEdicao($id) {
        $dados['usuario'] = Usuario::all();
        return view("Chatbot/alterarChatbot",[
            'chatbot'=>Chatbot::findorfail($id)
        ], $dados);
    }

    public function listar() {
        $dados['chatbot'] = Chatbot::all();
        return view('Chatbot/listarChatbots', $dados);
    }
    public function salvarAlteracao(Request $request, $id){
        $request->validate([
            'titulo' => 'required',
        ]);
        Chatbot::where('id',$id)->update($request->except('_token'));
        return redirect()->route('usuarios.listar')->with('acao', 'Atualizado com sucesso');
    }

    public function salvarNovoChatBot(Request $request ){
        //falta implementar view
        $autor = Session::get('USUARIO_LOGADO');
        $request->merge([
            'autor_id' => $autor->id
        ]);
        $request->validate([
            'titulo' => 'required',
            'autor_id' => 'required',
            'materia_id' => 'required'
        ]);
        Chatbot::create($request->all());

        return redirect()->route('chatbot.listar')->with('acao','Cadastrado com sucesso!');
    }
    public function redirecionarParaTelaDeCadastro(){
        $dados['materias'] = Materia::all();
        return view('Chatbot/cadastrarChatbot', $dados);
    }
    public function excluir($id){
        Chatbot::destroy($id);
        return redirect()->route('chatbot.listar')->with('acao','Exclusão Bem Sucedida');
    }
}
