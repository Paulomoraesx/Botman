@extends('template')
@section('conteudo_principal')

<div id="page" class="container">
		<div class="title">
			<h1>Suas Dúvidas</h1>
		</div>
        <div>
            <strong>Somente marcar como atendida se tiver realizado o cadastro da dúvida no chatbot</strong>
        </div>
		<table class="table table-hover">
			    <thead>
			      <tr>
					<th>Descrição</th>
                    <th>Status</th>
                    @if(Auth::user()->tipo_cadastro == 'P')
			        <th width="10%">Opções</th>
                    @endif
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($duvidas as $duvida)
					<tr>
						<td>{{$duvida['descricao_duvida']}}</td>

                        @if($duvida['atendida'] == false)
                        <td><label style="color: white; background: red">Não Atendida</label></td>
                        @else
                        <td><label style="color: white; background: green">Atendida</label></td>
                        @endif
                        @if(Auth::user()->tipo_cadastro == 'P')

                        @if($duvida['atendida']==true)
                        <td>
                            <a style="pointer-events: none" href="{{route('duvida.atender', ['id' => $duvida['id']])}}" class="btn botao-login-estilo">Dúvida Atendida</a>
                        </td>
                        @else
                        <td>
                            <a href="{{route('duvida.atender', ['id' => $duvida['id']])}}" class="btn botao-login-estilo">Marcar Como atendida</a>
                        </td>
                        @endif
                        @endif
					</tr>	
					@endforeach	 
			    </tbody>
			    <!-- DADOS [FIM] -->
			</table>
</div>

@endsection