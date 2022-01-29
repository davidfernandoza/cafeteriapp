URL de la app:
https://cafeteriapp.herokuapp.com/

* se debe de tener habilitado:
	PHP >= 7.2.5
	BCMath PHP Extension
	Ctype PHP Extension
	Fileinfo PHP Extension
	JSON PHP Extension
	Mbstring PHP Extension
	OpenSSL PHP Extension
	PDO PHP Extension
	Tokenizer PHP Extension
	XML PHP Extension

* se debe descargar e instalar composer:
	https://getcomposer.org/download/

* se debe descargar e intalar node.js lst
	https://nodejs.org/en/

* se debe de tener instalado mysql
* se crea una base de datos con el nombre de su agrado

* se descarga el repositorio y se debe de ejecutar los siguientes comandos dentro de la carpeta:
	
	composer install	
	npm install

* se debe de crear un archivo .env y configurarlo con los datos del .env.example
* despues de eso se debe de usar los siguientes comandos
	php artisan key:generate
	php artisan migrate --seed
	php artisan server
	
funciona en:
	http://localhost:8000/
	
