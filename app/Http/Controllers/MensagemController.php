<?php

namespace App\Http\Controllers;

use App\Mensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MensagemController extends Controller
{

    public function editar($id) {
        //falta implementar view
        $dados['mensagem'] = Mensagem::all();
        return view("usuarios/alterarUsuario",[
            'mensagem'=>Mensagem::findorfail($id)
        ], $dados);
    }

    public function listar() {
        //falta implementar view
        $dados['mensagem'] = Mensagem::all();
        return view('usuarios/listarUsuarios', $dados);
    }
    public function alterar(Request $request, $id){
        //falta implementar view
        $request->validate([
            'texto' => 'required',
            'inicial' => 'required'
        ]);
        Mensagem::where('id',$id)->update($request->except('_token'));
        return redirect()->route('usuarios.listar')->with('acao', 'Atualizado com sucesso');

    }
    public function visualizar($id){
        //falta implementar view
        $dados['mensagem'] = Mensagem::find($id);
        return view('usuarios/visualizarUsuario', $dados);
    }
    public function dadosUsuario(Request $request ){
        //falta implementar view
        $request->validate([
            'texto' => 'required',
            'inicial' => 'required'
        ]);
        Mensagem::create($request->all());

        return redirect()->route('usuarios.listar')->with('acao','Cadastrado com sucesso!');
    }
    public function redirecionarParaTelaDeCadastro($id){
        //falta implementar view
        Session::put('CHATBOTID', $id);
        $dados['mensagem'] = Mensagem::all();
        return view('mensagem/cadastrarMensagem');
    }

    public function excluir($id){
        //falta implementar view
        Mensagem::destroy($id);
        return redirect()->route('usuarios.listar')->with('acao','Exclusão Bem Sucedida');
    }

    public function teste(Request $request){
        dd($request);
        if($request->get('mensagem') == null){
            $response['sucesso'] = false;
            $response['mensagem'] = "A mensagem não pode estar vazia";
        }else{
            $response['sucesso'] = true;
            $response['mensagem'] = $request->get('mensagem');
            $response['opcao'] = $request->get('opcao');
        }

        echo json_encode($response);
    }

    public function cadastrarMensagemInicial(){

    }

    public function listarOpcoesParaNovaPergunta(Request $request){
         /*echo $request;*/

        $id = json_decode($request->id);



        $mensagemInicial = Mensagem::where('chatbot_id', $id)
            ->where('inicial', true)->get();
        var_dump($mensagemInicial);
        if(!empty($mensagemInicial)){
            echo 'ta vazio';
        }else{
            echo 'tem coisa';
        }
       /* $request->merge([
            'texto' => 'CHUPA MEU CU'
        ]);
        echo json_encode($request->all());*/


    }
}
