@extends('template');
@section('conteudo_principal')
<div id="banner-wrapper">
    <div id="banner" class="box container">
        <div class="row">
            <div class="col-7 col-12-medium">
                <div id="Alterar">
                    <h3>Alteração de dados do Curso</h3>
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
                    <form action="{{route('cursos.alterar', ['id' => $curso['id']])}}" method="post">
                        @csrf
                        <label for="descricao-curso">*Descrição Curso:</label>
                        <input type="text" id="descricao-curso" value="{{old('descricao_curso',$curso->descricao_curso)}}"name="descricao_curso" placeholder=""/>
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