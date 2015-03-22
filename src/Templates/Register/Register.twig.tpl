<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <style>* { text-align: center; } body { padding-top: 70px; } input { width: 100%; }</style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <p class="navbar-text">Mpwar Framework David Carrascosa</p>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/register" >Registro</a></li>
                    <li><a href="/login">Login</a></li>
                </ul>
                <p class="navbar-text navbar-right">Hora: {{ datetime }}</p>
            </div>
        </nav>
        <div class="col-md-2 col-md-offset-5">
            <h1>Registro</h1>
            <form method="post">
                <div class="form-group">
                    <label for="user">Usuario</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">@</span>
                        <input type="text" class="form-control" name='user' id="user" placeholder="Introduce el usuario" required>
                    </div>
                </div>
                <div class="list-group">
                    <label for="name">Nombre y apellidos</label>
                    <input type="text" class="list-group-item" name='name' id="name" placeholder="Introduce el nombre" required>
                    <input type="text" class="list-group-item" name='surname' id="surname" placeholder="Introduce los apellidos" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="list-group">
                        <input type="password" class="list-group-item" name='password' id="password" placeholder="Contraseña" required>
                        <input type="password" class="list-group-item" name='password2' id="password2" placeholder="Repetir contraseña" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Registrar</button>
            </form>
        </div>
    </body>
</html>