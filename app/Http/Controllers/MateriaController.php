<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Curso;

class MateriaController extends Controller
{
    public function editarMateria($id) {
        $dados['cursos'] = Curso::all();
        return view("materia/alterarMateria",[
            'materia'=>Materia::findorfail($id)
        ], $dados);
    }
 
    public function listarMaterias() {
        $dados['materias'] = Materia::all();
        return view('materia/listarMateria', $dados);
    }
    public function alterarMateria(Request $request, $id){
        $request->validate([
            'descricao_materia' => 'required',
            'curso_id' => 'required'
            ]);
            Materia::where('id',$id)->update($request->except('_token'));
            return redirect()->route('materia.listar')->with('acao', 'Matéria Atualizada com sucesso');

    }
    public function visualizarMateria($id){ 
        $dados['materia'] = Materia::find($id);
        return view('materia/visualizarMateria', $dados);
    }
    public function cadastrarMateria(Request $request ){
        $request->validate([
                'descricao_materia' => 'required',
                'curso_id' => 'required'
                ]);
                Materia::create($request->all());
                
        return redirect()->route('materia.listar')->with('acao','Matéria cadastrada com sucesso!');
     }
     public function redirecionarTelaCadastro(){
        $dados['cursos'] = Curso::all();
        return view('materia/cadastrarMateria', $dados);
    }
    public function excluirMateria($id){
        Materia::destroy($id);
        return redirect()->route('materia.listar')->with('acao','Matéria Excluida com sucesso');
    }
}
