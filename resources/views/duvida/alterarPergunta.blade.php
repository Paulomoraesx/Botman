@extends('template');
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Cadastro da pergunta</h2>
		</div>
		<!--ERRO NO CADASTRO INCOMPLETO  -->
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</ul>
			</div>
		@endif
		<!--[FIM ]CADASTRO  INCOMPLETO    -->
		<form action="{{route('pergunta.alterar', ['id' => $pergunta['id']])}}" method="post">
		@csrf
            <div class="boxCadastro">
                <div class="form-group row">
                    <label for="descricao-pergunta" class="col-md-4 col-form-label text-md-right">{{
                        __('Descricao') }}</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" id="descricao-pergunta"
                               name="descricao_pergunta" placeholder="Descrição da Pergunta.."/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="descricao-resposta" class="col-md-4 col-form-label text-md-right">{{
                        __('Resposta') }}</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" id="descricao-resposta"
                               name="descricao_resposta" placeholder="Descrição da resposta.."/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="materia" class="col-md-4 col-form-label text-md-right">Matéria*:</label>
                    <div class="col-md-6">
                        <select name="materia_id" id="materia" class="form-control">
                            @foreach($materias as $materia)
                            <option value="{{$materia->id}}">{{$materia->descricao_materia}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
			<div><input type="submit" class="button" value="Alterar"/></div>
		</form>
</div>
@endsection