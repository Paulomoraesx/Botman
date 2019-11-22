<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;

class AlunosController extends Controller
{
    public function editar($id) {
        $dados['cursos'] = Curso::all();
        return view("alunos/alterarAluno",[
            'alunos'=>Aluno::findorfail($id)
        ], $dados);
    }
 
    public function listar() {
        $dadosAluno['alunos'] = Aluno::all();
        return view('alunos/listarAluno', $dadosAluno);
    }   
    public function alterar(Request $request, $id){
        $request->validate([
            'nome' => 'required',
            'matricula' => 'required',
            'curso_id' => 'required',
            ]);
            Aluno::where('id',$id)->update($request->except('_token'));
            return redirect()->route('alunos.listar')->with('acao', 'Atualizado com sucesso');

    }
    public function visualizar($id){
        $dadosAluno['aluno'] = Aluno::find($id);
        return view('alunos/visualizarAluno', $dadosAluno);

    }
    public function dadosAluno(Request $request ){
        $request->validate([
                'nome' => 'required',
                'matricula' => 'required',
                'curso_id' => 'required',
                ]);
                Aluno::create($request->all());
                
        return redirect()->route('alunos.listar')->with('acao','Cadastrado com sucesso!');
     }
     public function cadastrar(){
        $dados['cursos'] = Curso::all();
        return view('alunos/cadastrarAluno', $dados);
    }
    public function excluir($id){
        Aluno::destroy($id);
        return redirect()->route('alunos.listar')->with('acao','Exclusão Bem Sucedida');
    }
}
