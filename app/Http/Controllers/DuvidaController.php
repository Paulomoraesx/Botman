<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Duvida;

class DuvidaController extends Controller
{
    public function editarDuvida($id) {
        $dados['materias'] = Materia::all();
        return view("duvida/alterarDuvida",[
            'duvida'=>Duvida::findorfail($id)
        ], $dados);
    }
 
    public function listarDuvida() {
        $dados['duvidas'] = Duvida::all();
        return view('duvida/listarDuvidas', $dados);
    }
    public function alterarDuvida(Request $request, $id){
        $request->validate([
            'descricao_duvida' => 'required',
            'descricao_resposta' => 'required',
            'materia_id' => 'required'
            ]);
            Duvida::where('id',$id)->update($request->except('_token'));
            return redirect()->route('duvida.listar')->with('acao', 'Duvida Atualizada com sucesso');

    }
    public function visualizarDuvida($id){
        $dados['duvida'] = Duvida::find($id);
        return view('duvida/visualizarDuvida', $dados);
    }
    public function cadastrarDuvida(Request $request){
        $request->validate([
                'descricao_duvida' => 'required',
                'descricao_resposta' => 'required',
                'materia_id' => 'required'
                ]);
                Duvida::create($request->all());
                
        return redirect()->route('duvida.listar')->with('acao','Duvida cadastrada com sucesso!');
     }
     public function redirecionarTelaCadastro(){
        $dados['materias'] = Materia::all();
        return view('duvida/cadastrarDuvida', $dados);
    }
    public function excluirDuvida($id){
        Duvida::destroy($id);
        return redirect()->route('duvida.listar')->with('acao','Duvida Excluida com sucesso');
    }
}
