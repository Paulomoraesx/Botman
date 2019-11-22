@extends('template');
@section('conteudo_principal')
<div id="banner-wrapper">
    <div id="banner" class="box container">
        <div class="row">
            <div class="col-7 col-12-medium">
                <div id="Alterar">
                    <h3>Alteração de dados do Aluno</h3>
                    <!--ERRO NO ALTERAR INCOMPLETO  -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!--[FIM ]ALTERAR  INCOMPLETO    -->
                    <form action="{{route('alunos.alterar', ['id' => $alunos['id']])}}" method="post">
                        @csrf

                        <label for="nome">*Nome:</label>
                        <input type="text" id="nome" value="{{old('nome',$alunos->nome)}}"name="nome" placeholder=""/>
                        <br/>

                        <label for="matricula">*Matricula:</label>
                        <input type="text" id="matricula" value="{{old('matricula',$alunos->matricula)}}"name="matricula" placeholder=""/>
                        <br/>



						<label for="curso">*Curso:</label>
						<select name="curso_id" id="curso">
						@foreach($cursos as $curso)
    					<option value="{{$curso->id}}">{{$curso->descricao_curso}}</option>
						@endforeach
						</select>
                        <br/>
                        
                        
                        <br/>
                        <div><input type="submit" class="btn-submit" value="Confirmar!"/></div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection