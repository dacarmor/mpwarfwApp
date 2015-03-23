# MpwarfwApp
------------------------
Miniaplicación de login y registro

## Instalación
------------------------
Primero clonamos el repositorio de la aplicación
```bash
$ git clone https://github.com/dacarmor/mpwarfwApp.git mpwarfwApp
```
A continuación, instalaremos Composer
```bash
$ curl -sS https://getcomposer.org/installer
```
Por último, deberemos hacemos uso de Composer para descargarnos el framework y todas sus dependencias. Así pues, en el mismo directorio dónde hemos descargado nuestra aplicación, actualizamos:
```bash
$ php composer update
```

## Configuración
------------------------
Una vez esté todo instalado, lo primero que deberemos hacer será crear la base de datos, que para ello haremos uso del archivo ```dump.SQL```:
```bash
$ mysqldump --user={USUARIO} --password={CONTRASEÑA} {BASE_DE_DATOS} > /path/to/dump.SQL
```
Además, deberemos modificar el archivo ```vendor\dacarmor\mpwarfw\src\Mpwarfw\Component\Database\Database.php``` con nuestros datos de conexión para poder hacer uso de la base de datos.

Opcionalmente, podremos crear dos Virtual Hosts para poder dirigir nuestra aplicación a un entorno de desarrollo (available soon) o a un entorno de producción.
```bash
<VirtualHost *:80>
DocumentRoot /path/to/framework/public
ServerName framework.prod
ServerAlias *.framework.prod
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !^(.+)\.(js|css|gif|png|jpg|swf|ico|txt|html)$
RewriteRule ^/(.+) /index.php [QSA,L]
</VirtualHost>
```
```bash
<VirtualHost *:80>
DocumentRoot /path/to/framework/public
ServerName framework.dev
ServerAlias *.framework.dev
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !^(.+)\.(js|css|gif|png|jpg|swf|ico|txt|html)$
RewriteRule ^/(.+) /index_dev.php [QSA,L]
</VirtualHost>
```

## Componentes
------------------------
* Container:
```bash
$this->container->get( {Service} );
```
El servicio se debe declarar en ```/src/Config/services.yaml```

* Twig:
```bash
$container = $this->container->get( 'Twig' );
$container->render( {Template directory}, {Values to render} )
```

* Smarty:
```bash
$container = $this->container->get( 'Smarty' );
$container->render( {Template directory}, {Values to render} )
```

* Base de datos:
```bash
$db = $this->container->get( 'Database' );
$db->select( {Query}, {Datos} );
$db->insert( {Tabla}, {Datos} );
$db->update( {Tabla}, {Datos}, {Condición} );
$db->delete( {Tabla}, {Datos} );
```

* Request:
```bash
$request = $this->request->{Service};
$request->getValue( {Variable name} );
```
Service = session/cookies/get/post/server/files

* HttpResponse:
```bash
return new HttpResponse( {Response action} );
```

* JsonResponse:
```bash
 return new JsonResponse( {Response action} );
```

* Routes:
Las rutas se construyen siguiendo el siguiente patrón:
```bash
/{controlador}/{param1}/{param2}/...
```
