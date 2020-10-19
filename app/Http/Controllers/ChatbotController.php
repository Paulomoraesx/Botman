<?php

namespace App\Http\Controllers;

use App\Chatbot;
use App\Models\Materia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChatbotController extends Controller
{
    public function redirecionarParaTelaDeEdicao($id) {
        $dados['usuario'] = User::all();
        return view("Chatbot/alterarChatbot",[
            'chatbot'=>Chatbot::findorfail($id)
        ], $dados);
    }
    public function listar() {
        $dados['chatbot'] = Chatbot::all();
        return view('Chatbot/listarChatbots', $dados);
    }
    public function listarChatbotsDeAcordoComCursoAluno() {
        $teste = Auth::user();
        $teste->curso_id;
        $dados['chatbots'] = Chatbot::join('materias',  'chatbots.materia_id', '=', 'materias.id')
            ->join('cursos', 'materias.curso_id', '=', 'cursos.id')
            ->where('cursos.id',  $teste->curso_id)
            ->select('chatbots.titulo')
            ->get();
        return view('Chatbot/listarChatbotsCurso', $dados);

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
        $autor = Auth::id();
        $request->merge([
            'autor_id' => $autor
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
