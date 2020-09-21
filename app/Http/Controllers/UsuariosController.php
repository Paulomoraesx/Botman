<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Curso;

class UsuariosController extends Controller
{
    public function redirecionarParaTelaDeEditar($id) {
        $dados['materias'] = Materia::all();
        return view("usuarios/alterarUsuario",[
            'usuarios'=>Usuario::findorfail($id)
        ], $dados);
    }
 
    public function listarUsuarios() {
        $dados['usuarios'] = Usuario::all();
        return view('usuarios/listarUsuarios', $dados);
    }

    public function salvarAlteracao(Request $request, $id){
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'materia_id' => 'required',
            ]);
            Usuario::where('id',$id)->update($request->except('_token'));
            return redirect()->route('usuarios.listar')->with('acao', 'Atualizado com sucesso');

    }

    public function visualizar($id){
        $dados['usuario'] = Usuario::find($id);
        return view('usuarios/visualizarUsuario', $dados);
    }

    public function salvarNovoUsuario(Request $request ){
        $request->validate([
                'nome' => 'required',
                'email' => 'required',
                'senha' => 'required',
                'tipo_cadastro' => 'required',
                'materia_id' => 'required',
                ]);
                Usuario::create($request->all());
                
        return redirect()->route('usuarios.listar')->with('acao','Cadastrado com sucesso!');
     }
     public function redirecionarParaTelaDeCadastroUsuario(){
         $dados['materias'] = Materia::all();
        return view('usuarios/cadastrarUsuario', $dados);
    }
    public function excluir($id){
        Usuario::destroy($id);
        return redirect()->route('usuarios.listar')->with('acao','Exclusão Bem Sucedida');
    }
}

