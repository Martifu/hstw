<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/login.scss" rel="stylesheet" />
    <title>Login</title>
</head>
<body>
<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-sm-12 col-md-6 col-xl-6 d-none d-sm-none d-md-block margin-login">
            <img class="figura" src="{{asset("img/Figura.png")}}">
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6 margin-login">
            <div class="row">
                <div class="col-12 text-center">
                    <img class="tamano-logo" src="{{asset("img/Logo.png")}}">
                </div>
                <div class="col-12 text-center">
                    <div class="bs-example">
                        <div class="form-group">
                            <label class="float-left" for="exampleInputEmail1">Correo electronico</label>
                            <input type="email" class="form-control" name="inputCorreo" id="inputCorreo" required>
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                        <div class="form-group">
                            <label class="float-left" for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control" name="inputPassword" id="inputPassword"
                                   required>
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                        <button id="btniniciarsesion" class="btn-color"> Iniciar sesion</button>
                        <div id="notificacion"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="js/login.js"></script>
</body>
</html>
