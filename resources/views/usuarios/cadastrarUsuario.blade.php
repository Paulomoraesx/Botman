@extends('template')

@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Cadastro</h2>
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
    <form action="{{route('usuarios.salvar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="boxCadastro">
            <div class="itemBoxCadastro">
                <label for="nome">Nome*:</label>
                <input class="componenteInputCadastro" type="text" id="nome" name="nome" placeholder="Nome.."/>
            </div>
            <div class="itemBoxCadastro">
                <label for="senha">Senha*:</label>
                <input class="componenteInputCadastro" type="password" id="senha" name="senha" placeholder="*******"/>
            </div>

            <div class="itemBoxCadastro">
                <label for="email">Email*:</label>
                <input class="componenteInputCadastro" type="text" id="email" name="email" placeholder="teste@teste.com"/>
            </div>
            <div class="itemBoxCadastro">
                <label for="usuario">Usuario*:</label>
                <select name="tipo_cadastro" id="usuario">
                    <option label="Aluno" value="A"></option>
                    <option label="Professor" value="P"></option>
                </select>
            </div>

            <div class="itemBoxCadastro">
                <label for="materia">Matéria*:</label>
                <select name="materia_id" id="materia">
                    @foreach($materias as $materia)
                    <option value="{{$materia->id}}">{{$materia->descricao_materia}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div><input type="submit" class="button" value="Cadastrar"/></div>
    </form>
</div>
@endsection