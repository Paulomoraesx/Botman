@extends('template');
@section('conteudo_principal')
<div id="banner-wrapper">
    <div id="banner" class="box container">
        <div class="row">
            <div class="col-7 col-12-medium">
                <div id="Alterar">
                    <h3>Alterar Matéria</h3>
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
                    <form action="{{route('materia.alterar', ['id' => $materia['id']])}}" method="post">
                        @csrf
                        <label for="descricao-materia">*Descrição Matéria:</label>
                        <input type="text" id="descricao-materia" value="{{old('descricao-materia',$materia->descricao_materia)}}"name="descricao_materia" placeholder=""/>
                            <br/>
                        <label for="curso">*Curso:</label>
						<select name="curso_id" id="curso">
						@foreach($cursos as $curso)
    					<option value="{{$curso->id}}">{{$curso->descricao_curso}}</option>
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