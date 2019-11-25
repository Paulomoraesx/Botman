@extends('template');
@section('conteudo_principal')
<div id="banner-wrapper">
    <div id="banner" class="box container">
        <div class="row">
            <div class="col-7 col-12-medium">
                <div id="Alterar">
                    <h3>Alterar Pergunta</h3>
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
                    <form action="{{route('pergunta.alterar', ['id' => $pergunta['id']])}}" method="post">
                        @csrf
                        <label for="descricao-pergunta">*Descrição Pergunta:</label>
                        <input type="text" id="descricao-pergunta" value="{{old('descricao-pergunta',$pergunta->descricao_pergunta)}}"name="descricao_pergunta" placeholder=""/>
                        <br/>
                        <label for="descricao-resposta">*Descrição da resposta:</label>
                        <input type="text" id="descricao-resposta" value="{{old('descricao-resposta',$pergunta->descricao_resposta)}}"name="descricao_resposta" placeholder=""/>
                        <br/>
                        <label for="materia">*Matéria:</label>
						<select name="materia_id" id="materia">
						@foreach($materias as $materia)
    					<option value="{{$materia->id}}">{{$materia->descricao_materia}}</option>
						@endforeach
						</select>
                        <br/>
                        <div><input type="submit" class="btn-submit" value="Confirmar!"/></div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection