<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <style>* { text-align: center; } body { padding-top: 70px; }</style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <p class="navbar-text">Mpwar Framework David Carrascosa</p>
                <ul class="nav navbar-nav">
                    <li><a href="/register" >Registro</a></li>
                    <li class="active"><a href="/login">Login</a></li>
                </ul>
                <p class="navbar-text navbar-right">Hora: {$datetime}</p>
            </div>
        </nav>
        <div class="col-md-2 col-md-offset-5">
            <h1>Login</h1>
            <form method="post">
                <div class="form-group">
                    <label for="user">Usuario</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">@</span>
                        <input type="text" class="form-control" name='user' id="user" placeholder="Introduce el usuario" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name='password' id="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-default">Entrar</button>
            </form>
        </div>
    </body>
</html>