<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Pergunta;

class PerguntaController extends Controller
{
    public function editarPergunta($id) {
        $dados['materias'] = Materia::all();
        return view("pergunta/alterarPergunta",[
            'pergunta'=>Pergunta::findorfail($id)
        ], $dados);
    }
 
    public function listarPergunta() {
        $dados['perguntas'] = Pergunta::all();
        return view('pergunta/listarPergunta', $dados);
    }
    public function alterarPergunta(Request $request, $id){
        $request->validate([
            'descricao_pergunta' => 'required',
            'descricao_resposta' => 'required',
            'materia_id' => 'required'
            ]);
            Pergunta::where('id',$id)->update($request->except('_token'));
            return redirect()->route('pergunta.listar')->with('acao', 'Pergunta Atualizada com sucesso');

    }
    public function visualizarPergunta($id){ 
        $dados['pergunta'] = Pergunta::find($id);
        return view('pergunta/visualizarPergunta', $dados);
    }
    public function cadastrarPergunta(Request $request){
        $request->validate([
                'descricao_pergunta' => 'required',
                'descricao_resposta' => 'required',
                'materia_id' => 'required'
                ]);
                Pergunta::create($request->all());
                
        return redirect()->route('pergunta.listar')->with('acao','Pergunta cadastrada com sucesso!');
     }
     public function redirecionarTelaCadastro(){
        $dados['materias'] = Materia::all();
        return view('pergunta/cadastrarPergunta', $dados);
    }
    public function excluirPergunta($id){
        Pergunta::destroy($id);
        return redirect()->route('pergunta.listar')->with('acao','Pergunta Excluida com sucesso');
    }
}
