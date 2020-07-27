<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Curso;

class ProfessoresController extends Controller
{
    public function editar($id) {
        $dados['cursos'] = Curso::all();
        return view("professors/alterarProfessor",[
            'professors'=>Professor::findorfail($id)
        ], $dados);
    }
 
    public function listar() {
        $dados['professors'] = Professor::all();
        return view('professors/listarProfessor', $dados);
    }
    public function alterar(Request $request, $id){
        $request->validate([
            'matricula' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'tipo_cadastro' => 'required',
            'curso_id' => 'required',
            ]);
            Professor::where('id',$id)->update($request->except('_token'));
            return redirect()->route('professors.listar')->with('acao', 'Atualizado com sucesso');

    }
    public function visualizar($id){
        $dados['professor'] = Professor::find($id);
        return view('professors/visualizarProfessor', $dados);

    }
    public function dados(Request $request ){
        $request->validate([
                'matricula' => 'required',
                'nome' => 'required',
                'email' => 'required',
                'tipo_cadastro' => 'required',
                'curso_id' => 'required',
                ]);
                Professor::create($request->all());
                
        return redirect()->route('professors.listar')->with('acao','Cadastrado com sucesso!');
     }
     public function cadastrar(){
         $dados['cursos'] = Curso::all();
        return view('professors/cadastrarProfessor', $dados);
    }
    public function excluir($id){
        Professor::destroy($id);
        return redirect()->route('professors.listar')->with('acao','Exclusão Bem Sucedida');
    }
}

