<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursosController extends Controller
{
    public function editarCurso($id) {
        return view("cursos/alterarCurso",[
            'curso'=>Curso::findorfail($id)
        ]);
    }
 
    public function listarCursos() {
        $dados['curso'] = Curso::all();
        return view('cursos/listarCursos', $dados);
    }
    public function alterarCurso(Request $request, $id){
        $request->validate([
            'descricao_curso' => 'required'
            ]);
            Curso::where('id',$id)->update($request->except('_token'));
            return redirect()->route('cursos.listar')->with('acao', 'Curso Atualizado com sucesso');

    }
    public function visualizarCurso($id){
        $dados['curso'] = Curso::find($id);
        return view('cursos/visualizarCurso', $dados);
    }
    public function cadastrarCurso(Request $request ){
        $request->validate([
                'descricao_curso' => 'required'
                ]);
                Curso::create($request->all());
                
        return redirect()->route('cursos.listar')->with('acao','Curso cadastrado com sucesso!');
     }
     public function redirecionarTelaCadastro(){
        return view('cursos/cadastrarCurso');
    }
    public function excluirCurso($id){
        Curso::destroy($id);
        return redirect()->route('cursos.listar')->with('acao','Curso Excluido com sucesso');
    }
}

