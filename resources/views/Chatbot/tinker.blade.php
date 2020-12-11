@extends('template')

@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h1>ChatBot</h1>
        </div>

        <div class="gallery">

				<div class="boxB" style="background-color:#79C255">
                    <div class="content" id="app">
                        <botman-tinker api-endpoint="/botman" style="background-color:#79C255; border:gray 1px solid;"></botman-tinker>
                    </div>
				</div>
				<label style="margin-top: 100px">Para inicar uma conversação com o Robô monitor, fale "oi".</label>
            <label style="margin-top: 100px">Caso você ainda esteja com dúvidas, adicione ela aqui para que o
                professor possa responde-la posteriormente.</label>
            <a href="{{route('duvida.cadastrar')}}" class="button">Adicionar Dúvida</a>
		</div>
</div>


@endsection