<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Support\Facades\Session;

class UsuariosController extends Controller
{
    public function redirecionarParaTelaDeEditar($id) {
        $dados['cursos'] = Curso::all();
        return view("usuarios/alterarUsuario",[
            'users'=>User::findorfail($id)
        ], $dados);
    }

    public function listarUsuarios() {
        $dados['users'] = User::all();
        return view('usuarios/listarUsuarios', $dados);
    }


/*    public function listarProfessores() {
        $dados['users'] = User::where('tipo_cadastro','P')->get();
        return view('usuarios/listarProfessores', $dados);
    }
    public function listarAlunos() {
        $dados['users'] = User::where('tipo_cadastro','A')->get();
        return view('usuarios/listarAlunos', $dados);
    }*/

    public function salvarAlteracao(Request $request, $id){
        $request->validate([
            'matricula' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tipo_cadastro' => 'required',
            'curso_id' => 'required',
            ]);
            User::where('id',$id)->update($request->except('_token'));
            return redirect()->route('usuarios.listar')->with('acao', 'Atualizado com sucesso');

    }

    public function visualizar($id){
        $dados['user'] = User::find($id);
        return view('usuarios/visualizarUsuarios', $dados);
    }

    public function salvarNovoUsuario(Request $request ){
        $request->validate([
                'matricula' => 'required',
                'nome' => 'required',
                'email' => 'required',
                'password' => 'required',
                'tipo_cadastro' => 'required',
                'curso_id' => 'required',
                ]);
                User::create($request->all());
                
        return redirect()->route('usuarios.listar')->with('acao','Cadastrado com sucesso!');
     }
     public function redirecionarParaTelaDeCadastroUsuario(){
         $dados['cursos'] = Curso::all();
        return view('usuarios/cadastrarUsuario', $dados);
    }
    public function excluir($id){
        User::destroy($id);
        return redirect()->route('usuarios.listar')->with('acao','Exclusão Bem Sucedida');
    }
}

