<!DOCTYPE html>
<html>
    <head>
        <title>Inicio</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <style>* { text-align: center; } body { padding-top: 70px; }</style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <p class="navbar-text">Mpwar Framework David Carrascosa</p>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Inicio</a></li>
                    <li><a href="/profile/{{ user }}">Perfil</a></li>
                    <li><a href="/close">Cerrar sesión</a></li>
                </ul>
                <p class="navbar-text navbar-right">{{ name }} {{ surname }}</p>
            </div>
        </nav>
        <div class="col-md-4 col-md-offset-4">
            <h1>Inicio</h1>
            <h3>¡Hola {{ name }}!</h3>
            <p>Bienvenido al test del MPWAR Framework ;)</p>
            <p>Si así lo deseas, puedes modificar tus datos en tu área de <a href="/profile/{{ user }}">Perfil</a>.</p>
        </div>
    </body>
</html>