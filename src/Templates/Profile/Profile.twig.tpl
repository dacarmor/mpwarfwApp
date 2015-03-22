<!DOCTYPE html>
<html>
    <head>
        <title>Perfil</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <style>* { text-align: center; } body { padding-top: 70px; } input { width: 100%; }</style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <p class="navbar-text">Mpwar Framework David Carrascosa</p>
                <ul class="nav navbar-nav">
                    <li><a href="/">Inicio</a></li>
                    <li class="active"><a href="/profile/{{ user }}">Perfil</a></li>
                    <li><a href="/close">Cerrar sesión</a></li>
                </ul>
                <p class="navbar-text navbar-right">{{ name }} {{ surname }}</p>
            </div>
        </nav>
        <div class="col-md-2 col-md-offset-5">
            <h1>Perfil</h1>
            <form method="post">
                <fieldset disabled="disabled">
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ user }}">
                    </div>
                </fieldset>
                <div class="list-group">
                    <label for="name">Nombre y apellidos</label>
                    <input type="text" class="list-group-item" name='name' placeholder="Introduce el nombre" value="{{ name }}" required>
                    <input type="text" class="list-group-item" name='surname' placeholder="Introduce los apellidos" value="{{ surname }}" required>
                </div>
                <div class="list-group">
                    <label for="password">Modificar contraseña</label>
                    <input type="password" class="list-group-item" name='password' id="password" placeholder="Contraseña">
                    <input type="password" class="list-group-item" name='password2' id="password2" placeholder="Repetir contraseña">
                </div>
                <button type="submit" class="btn btn-default">Guardar cambios</button>
            </form>
        </div>
    </body>
</html>