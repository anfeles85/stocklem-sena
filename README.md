# stocklem-sena

proyecto de inventario de la granja para el SENA CLEM

## Tabla de Contenido

- [Getting Started](#getting-started)
- [Prerequisitos](#prerequisitos)
- [Instalación](#instalación)
- [Features](#features)
- [Built With](#built-with)
- [Autores](#autores)
- [Contacto](#contacto)
- [Licencia](#licencia)

## Getting Started

Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y testing.

## Prerequisitos

Qué necesitas para instalar el software:<br>
PHP >= 8.1<br>
Composer >= 2.0<br>
Node.js >= 16.x<br>
NPM >= 8.x<br>
MySQL >= 8.0<br>
Git<br>


## Instalación

Paso a paso para tener el entorno de desarrollo ejecutándose:<br>

1. Clonar el repositorio<br>

git clone https://github.com/anfeles85/stocklem-sena.git<br>
cd stocklem-sena<br>


2. Instalar dependencias PHP<br>

composer install<br>


3. Instalar dependencias Node.js<br>

npm install<br>

4. Configurar variables de entorno<br>

cp .env.example .env<br>


5. Configurar base de datos en `.env`<br>

DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=stocklem_db<br>
DB_USERNAME=tu_usuario<br>
DB_PASSWORD=tu_contraseña<br>


6. Generar key de aplicación

php artisan key:generate

7. Ejecutar migraciones<br>

php artisan migrate<br>


8. Compilar assets<br>

npm run dev<br>

9. Iniciar servidor<br>

php artisan serve


## Features

- Dashboard con métricas en tiempo real
- Gestión de personas (CRUD completo)
- Gestión de proveedores
- Control de artículos e inventario
- Registro de entradas y salidas
- Sistema de categorías
- Generación de reportes
- Sistema de roles y permisos
- Diseño responsive

## Built With

- Laravel 10 - Framework PHP
- PHP 8.1 - Lenguaje de programación
- MySQL - Base de datos
- Bootstrap - Framework CSS
- JavaScript - Lenguaje frontend
- Vite - Build tool
- Composer - Gestor de dependencias PHP
- NPM - Gestor de paquetes Node.js

## Autores

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/NicolleMelendez">
        <img src="https://github.com/anfeles85.png" width="100px;" alt="Andrés Felipe"/><br />
        <sub><b>Nicolle Melendez</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/usuario2">
        <img src="https://github.com/usuario2.png" width="100px;" alt="Usuario 2"/><br />
        <sub><b>Nombre Usuario 2</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/usuario3">
        <img src="https://github.com/usuario3.png" width="100px;" alt="Usuario 3"/><br />
        <sub><b>Nombre Usuario 3</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/usuario4">
        <img src="https://github.com/usuario4.png" width="100px;" alt="Usuario 4"/><br />
        <sub><b>Nombre Usuario 4</b></sub>
      </a>
    </td>
  </tr>
  <tr>
    <td align="center">
      <a href="https://github.com/usuario5">
        <img src="https://github.com/usuario5.png" width="100px;" alt="Usuario 5"/><br />
        <sub><b>Nombre Usuario 5</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/usuario6">
        <img src="https://github.com/usuario6.png" width="100px;" alt="Usuario 6"/><br />
        <sub><b>Nombre Usuario 6</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/usuario7">
        <img src="https://github.com/usuario7.png" width="100px;" alt="Usuario 7"/><br />
        <sub><b>Nombre Usuario 7</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/usuario8">
        <img src="https://github.com/usuario8.png" width="100px;" alt="Usuario 8"/><br />
        <sub><b>Nombre Usuario 8</b></sub>
      </a>
    </td>
  </tr>
</table>

## Contacto

- Email: [software.clem@gmail.com](mailto:software.clem@gmail.com)
- Proyecto: [https://github.com/anfeles85/stocklem-sena](https://github.com/anfeles85/stocklem-sena)

## Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo LICENSE para detalles.




