@extends('template')

@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h1>ChatBot</h1>
        </div>

        <div class="gallery">

				<div class="boxA">
				</div>

				<div class="boxB" style="background-color:#79C255">
                    <div class="content" id="app">
                        <botman-tinker api-endpoint="/botman" style="background-color:#79C255; border:gray 1px solid;"></botman-tinker>
                    </div>
				</div>
				<label style="margin-top: 100px">Para inicar uma conversação com o Robô monitor, fale "oi".</label>
		</div>
</div>


@endsection