<?php

namespace App\Http\Controllers;

use App\Mensagem;
use App\OpcoesMensagem;
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
        $dados['mensagems'] = Mensagem::all();
        $dados['opcoes'] = OpcoesMensagem::all();
        return view('mensagem/cadastrarMensagem', $dados);
    }

    public function excluir($id){
        //falta implementar view
        Mensagem::destroy($id);
        return redirect()->route('usuarios.listar')->with('acao','Exclusão Bem Sucedida');
    }

    public function teste(Request $request){
        dd($request);
        $request->session()->get("CHATBOTID");
        $request->validate([
            'mensagem' => 'required',
        ]);
        $verificandoMensagemInicial = Mensagem::where('chatbot_id', $request->session()->get("CHATBOTID"))->where('inicial', true)->first();
        $mensagem = new Mensagem();
        $mensagem->mensagem = $request->mensagem;
        if($verificandoMensagemInicial == null){
            $mensagem->inicial = true;
        }else{
            $mensagem->inicial = false;
        }
        $mensagem->chatbot_id = $request->session()->get("CHATBOTID");

        $mensagem->save();
        if($request->get('opcoes') > 0){
            foreach ($request->get('opcoes') as $opcao){
                $newOpcao = new OpcoesMensagem();
                $newOpcao->descricao_opcao = $opcao;
                $newOpcao->mensagem_id_destino = null;
                $newOpcao->mensagem_id_origem = $mensagem->id;
                $newOpcao->save();
            }
        }

    }

    public function deletarOpcao(Request $request){
        OpcoesMensagem::where('id',$request->get('idToRemove'))->delete();
    }

    public function cadastrarMensagemInicial(){

    }

    public function listarOpcoesParaNovaPergunta(Request $request){
        $opcoes = OpcoesMensagem::all();
        echo json_encode($opcoes);
    }
}
