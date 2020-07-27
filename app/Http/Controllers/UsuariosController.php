<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Curso;

class UsuariosController extends Controller
{
    public function editar($id) {
        $dados['cursos'] = Curso::all();
        return view("usuarios/alterarUsuario",[
            'usuarios'=>Usuario::findorfail($id)
        ], $dados);
    }
 
    public function listar() {
        $dados['usuarios'] = Usuario::all();
        return view('usuarios/listarUsuarios', $dados);
    }
    public function alterar(Request $request, $id){
        $request->validate([
            'matricula' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'curso_id' => 'required',
            ]);
            Usuario::where('id',$id)->update($request->except('_token'));
            return redirect()->route('usuarios.listar')->with('acao', 'Atualizado com sucesso');

    }
    public function visualizar($id){
        $dados['usuario'] = Usuario::find($id);
        return view('usuarios/visualizarUsuario', $dados);

    }
    public function dadosUsuario(Request $request ){
        $request->validate([
                'matricula' => 'required',
                'nome' => 'required',
                'email' => 'required',
                'senha' => 'required',
                'tipo_cadastro' => 'required',
                'curso_id' => 'required',
                ]);
                Usuario::create($request->all());
                
        return redirect()->route('usuarios.listar')->with('acao','Cadastrado com sucesso!');
     }
     public function cadastrar(){
         $dados['cursos'] = Curso::all();
        return view('usuarios/cadastrarUsuario', $dados);
    }
    public function excluir($id){
        Usuario::destroy($id);
        return redirect()->route('usuarios.listar')->with('acao','Exclusão Bem Sucedida');
    }
}

