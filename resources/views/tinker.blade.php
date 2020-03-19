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
                        <botman-tinker api-endpoint="/botman" style="background-color:#79C255"></botman-tinker>
                    </div>
				</div>
		</div>
</div>


@endsection