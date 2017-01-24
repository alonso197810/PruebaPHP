# PruebaPHP
Para usar este proyecto, primero clone el repositorio desde GitHub en la carpeta html de su servidor apache en su maquina local, a continuacion:
<pre>
Version de PHP requerida: 5.6.30

Parte 1:

Problema 1:

http://localhost/PruebaPHP/Parte1/?opcion=1&valor=123%20abcd*3

Problema 2:

http://localhost/PruebaPHP/Parte1/?opcion=2&valor[]=55&valor[]=58&valor[]=60

Problema 3:

http://localhost/PruebaPHP/Parte1/?opcion=3&valor=()())()

Parte 2:

$ cd /var/www/html/PruebaPHP/Parte2/aplicacion
$ composer install
$ php -S 0.0.0.0:8082 -t public public/index.php

Listado

http://0.0.0.0:8082

Detalle

http://0.0.0.0:8082/view/574daa37114b923fcb959533

Servicio XML

http://0.0.0.0:8082/xml?minimo=1191.58&maximo=1314.05
</pre>
