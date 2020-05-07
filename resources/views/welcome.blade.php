<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        


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

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg " style="background-color: #d39e00; color: white">
        <a class="navbar-brand" style="color: white" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#homepage" aria-controls="homepage" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="homepage">
            <ul class="navbar-nav mr-auto" style="color: white">
                
                <li>
                    @if (Route::has('login'))
                    <div class=" links">
                        @auth
                            <a style="color: white" href="{{ url('/home') }}">Home</a>
                        @else
                            <a style="color: white" href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a style="color: white" href="{{ route('register') }}">Registro</a>
                            @endif
                        @endauth
                    </div>
                    @endif
                </li>
            </ul>
           
            
        </div>
    </nav>


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de contácto</div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                    <form method="POST" action="{{ route('guardar') }}">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input name="nombres" type="text" class="form-control">
                          

                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellidos</label>
                            <input name="apellidos" type="text" class="form-control">
                          

                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Teléfono</label>
                            <input name="telefono" type="tel" class="form-control">
                           

                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control">
                                                      
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Programas</label>
                            <select name="programa" class="form-control" >
                                <option selected >Seleccione</option>
                                <option value="Bachillerato" >Bachillerato</option>
                                <option value="Inglés" >Inglés</option>
                                <option value="Preicfes" >Preicfes</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
