<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > form > a, .links > form > button {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
				float: left;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Lucas França Barbosa
                </div>

                <div class="links">
					<form target="_blank" action="{{route('veiculos.execCrawler')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit">popular com crawler</button>
					</form>
					
					<form target="_blank" action="{{route('veiculos.execCrawler')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit">trazer veiculos</button>
					</form>
					<br>
					<form target="_blank" action="{{route('veiculos.search')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">						
						<select class="form-control col-md-10 m-auto" id="TipoVeiculo" name="TipoVeiculo">
							<option Value="A" selected>Carro</option>
							<option Value="M" >Moto</option>
							<option Value="C" >Caminhão</option>
						</select>
						<select class="form-control col-md-10 m-auto" id="Kilometragem" name="Kilometragem">
							<option Value="0" selected>0 KM</option>
							<option Value="1" >Seminovo</option>
						</select>
						<button type="submit">Buscar</button>
					</form>
                </div>
            </div>
        </div>
    </body>
</html>
