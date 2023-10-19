# Instalación y configuración del proyecto

## (XAMPP/PHP)

### Versiones requeridas

- XAMPP: versión con PHP 8.2

- PHP: 8.2
- Mysql: ^8/MariaDB ^10
- Laravel: 10

### Descargar XAMPP

https://www.apachefriends.org/es/download.html

### Instalar Dependencias y Configurar el Entorno

composer install

cp .env.example .env

php artisan key:generate

### Configurar la Base de Datos

Configura el archivo .env con los detalles de la base de datos MySQL.

Posteriormente, crear la base de datos.

### Ejecutar Migraciones y Datos de Prueba

php artisan migrate:fresh --path=database/migrations/v1

php artisan db:seed --class="Database\\Seeders\\v1\\DatabaseSeeder"

### Iniciar el Servidor de Desarrollo

php artisan serve

### Test unitarios

#### Configura la Base de Datos de Pruebas

cp .env.example .env.testing

Configura el archivo .env con los detalles de la base de datos MySQL.

Posteriormente, crear la base de datos para tests.

#### Limpia la caché del nuevo .env

php artisan config:clear --env=testing

#### Ejecuta Migraciones en Base de Datos de prueba

php artisan --env=testing migrate:fresh --path=database/migrations/v1

#### Ejecuta los tests

php artisan test

## Sail

Necesitas tener instalado la última versión de docker y docker compose.
Para usar Sail en Windows necesitas utilizar el subsistema Linux WSL2.

los servicios expuestos son:
 - PHP: 8.2
 - Mysql: 8.0
 - PhpMyAdmin: latest

### Instalar Dependencias y Configurar el Entorno

docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php82-composer:latest composer install --ignore-platform-reqs

cp .env.example .env

./vendor/bin/sail artisan key:generate

### Configurar la Base de Datos

Configura el archivo .env con los detalles de la base de datos MySQL.

### Ejecutar Migraciones y Datos de Prueba

./vendor/bin/sail artisan migrate:fresh --path=database/migrations/v1

./vendor/bin/sail artisan db:seed --class="Database\\Seeders\\v1\\DatabaseSeeder"

### Iniciar el Servidor de Desarrollo

./vendor/bin/sail artisan serve

### Test unitarios

#### Configura la Base de Datos de Pruebas

cp .env.example .env.testing

Configura el archivo .env con los detalles de la base de datos MySQL.

#### Limpia la caché del nuevo .env

./vendor/bin/sail artisan config:clear --env=testing

#### Ejecuta Migraciones en Base de Datos de prueba

./vendor/bin/sail artisan --env=testing migrate:fresh --path=database/migrations/v1

#### Ejecuta los tests

./vendor/bin/sail artisan test

### Simplificar comando

Crear un alias para usar sail en vez de ./vendor/bin/sail:

alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

# Postman

Cambiar la variable de la collection en función al servidor de desarrollo que se genere

# Logs

Para poder revisar los logs de la API, acceder a la carpeta \storage\logs
