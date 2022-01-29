<h2>1)</h2> URL de la app:

https://cafeteriapp.herokuapp.com/

Se debe de tener habilitado:

* PHP >= 7.2.5
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

Se debe descargar e instalar composer:

https://getcomposer.org/download/


Se debe descargar e intalar node.js lst

https://nodejs.org/en/

Se debe de tener instalado mysql

Se crea una base de datos con el nombre de su agrado

Se descarga el repositorio y se debe de ejecutar los siguientes comandos dentro de la carpeta:
	
* composer install	
* npm install

Se debe de crear un archivo .env y configurarlo con los datos del .env.example

Despues de eso se debe de usar los siguientes comandos:

* php artisan key:generate
* php artisan migrate --seed
* php artisan server

	
Funciona en:

http://localhost:8000/

<h2>2)</h2> Las counsultas y la base de datos estan en la carpeta /sql
	
