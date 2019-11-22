@extends("base")

@section("contenido")
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-6 d-none d-sm-none d-md-block">
                <img class="figura" src="{{asset("img/Figura.png")}}">
            </div>
            <div class="col-sm-12 col-md-6 col-xl-6 margin-login">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="tamano-logo" src="{{asset("img/Logo.png")}}">
                    </div>
                    <div class="col-12 text-center">
                        <div class="bs-example">
                            <form role="form">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" required>
                                    <span class="form-highlight"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label" for="exampleInputEmail1">Correo electronico</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputEmail1" required>
                                    <span class="form-highlight"></span>
                                    <span class="form-bar"></span>
                                    <label class="float-label" for="exampleInputEmail1">Password</label>
                                </div>
                                <button class="btn btn-color"> Iniciar sesion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@show