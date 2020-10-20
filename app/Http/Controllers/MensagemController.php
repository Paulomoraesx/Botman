<?php

namespace App\Http\Controllers;

use App\Mensagem;
use App\OpcoesMensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MensagemController extends Controller
{

    public function redirecionarParaTelaDeFluxo($id){
        Session::put('CHATBOTID', $id);
        $dados['mensagems'] = Mensagem::all();
        $dados['opcoes'] = OpcoesMensagem::all();
        return view('mensagem/cadastrarMensagem', $dados);
    }

    public function cadastrarMensagem(Request $request){
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
        if($request->get('opcoesNovas') > 0){
            $response['opcoesNovas'] = $this->cadastrarOpcoesNovas(($request->get('opcoesNovas')), $mensagem->id);
            $response['novaOpcao'] = true;
        }

        if($request->get('mensagem_id_destino') != null){
            $this->adicionarOpcaoDestino($request->get('mensagem_id_destino'), $mensagem->id);
        }

        $response['inicial'] = $mensagem->inicial;
        $response['mensagemId'] = $mensagem->id;
        echo json_encode($response);
    }

    public function atualizarMensagem(Request $request){
        $i=0;
        $request->validate([
            'mensagem' => 'required',
        ]);
        $mensagem = Mensagem::find($request->get('mensagemId'));
        $mensagem->mensagem = $request->mensagem;
        $mensagem->save();
        $response['mensagemId'] = $mensagem->id;
        $opcoesParaAtualizar = $request->get('opcao');

        if ($request->get('opcao') > 0){
            foreach ($request->get('opcaoId') as $id) {
                $this->atualizarOpcoes($opcoesParaAtualizar[$i], $id);
                $i++;
            }
        }
        if($request->get('opcoesNovas') > 0){
            $response['opcoesNovas'] = $this->cadastrarOpcoesNovas($request->get('opcoesNovas'), $mensagem->id);
            $response['novaOpcao'] = true;
        }

        if($request->get('mensagem_id_destino') != null){
            $this->adicionarOpcaoDestino($request->get('mensagem_id_destino'), $mensagem->id);
        }

        echo json_encode($response);

    }

    private function adicionarOpcaoDestino($idOpcao ,$idDestino){
        $destino = OpcoesMensagem::find($idOpcao);
        $destino->mensagem_id_destino = $idDestino;
        $destino->save();
    }

    private function cadastrarOpcoesNovas($opcoes, $idMensagem){
        $opcoesNovas= [];
        foreach ($opcoes as $opcao) {
            $newOpcao = new OpcoesMensagem();
            $newOpcao->descricao_opcao = $opcao;
            $newOpcao->mensagem_id_destino = null;
            $newOpcao->mensagem_id_origem = $idMensagem;
            $newOpcao->save();
            $opcoesNovas[] = $newOpcao;
        }
        return $opcoesNovas;
    }

    private function atualizarOpcoes($opcao, $id){
        $update = OpcoesMensagem::find($id);
        $update->descricao_opcao = $opcao;
        $update->save();
    }

    public function deletarOpcao(Request $request){
        OpcoesMensagem::where('id',$request->get('idToRemove'))->delete();
    }

    public function listarOpcoesMensagem(Request $request){
        $opcoes = OpcoesMensagem::where('mensagem_id_origem', $request->get('idMensagem'))->get();
        echo json_encode($opcoes);
    }

    public function listarOpcoesParaNovaPergunta(Request $request){
        $opcoes = OpcoesMensagem::all();
        echo json_encode($opcoes);
    }
}
