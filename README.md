# stocklem-sena

proyecto de inventario de la granja para el SENA CLEM

## 📚 Tabla de Contenido

- [Getting Started](#getting-started)
- [Prerequisitos](#prerequisitos)
- [Instalación](#instalación)
- [Features](#features)
- [Built With](#built-with)
- [Autores](#autores)
- [Contacto](#contacto)
- [Licencia](#licencia)

# 🚀 Getting Started

Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y testing.

# 🛠️ Prerequisitos

Qué necesitas para instalar el software:<br>
    PHP >= 8.1<br>
    Composer >= 2.0<br>
    Node.js >= 16.x<br>
    NPM >= 8.x<br>
    MySQL >= 8.0<br>
    Git<br>


# ⚙️ Instalación

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


# ✨ Features

- Dashboard con métricas en tiempo real
- Gestión de personas (CRUD completo)
- Gestión de proveedores
- Control de artículos e inventario
- Registro de entradas y salidas
- Sistema de categorías
- Generación de reportes
- Sistema de roles y permisos
- Diseño responsive

# 🏗️ Built With

- Laravel 10 - Framework PHP
- PHP 8.1 - Lenguaje de programación
- MySQL - Base de datos
- Bootstrap - Framework CSS
- JavaScript - Lenguaje frontend
- Vite - Build tool
- Composer - Gestor de dependencias PHP
- NPM - Gestor de paquetes Node.js

# 👩‍💻 Autores

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/Juand4rck12">
        <img src="https://github.com/Juand4rck12.png" width="100px;" alt="Juand4rck12"/><br />
        <sub><b>Juand4rck12</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/JJuanJoArenas">
        <img src="https://github.com/JJuanJoArenas.png" width="100px;" alt="JJuanJoArenas"/><br />
        <sub><b>JJuanJoArenas</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/Esteban-cv">
        <img src="https://github.com/Esteban-cv.png" width="100px;" alt="Esteban-cv"/><br />
        <sub><b>Esteban-cv</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/DanielOrtiz2003">
        <img src="https://github.com/DanielOrtiz2003.png" width="100px;" alt="DanielOrtiz2003"/><br />
        <sub><b>Daniel Ortiz 2003</b></sub>
      </a>
    </td>
  </tr>
    <tr>
    <td align="center">
      <a href="https://github.com/Karol-Dayana-2006">
        <img src="https://github.com/Karol-Dayana-2006.png" width="100px;" alt="Karol-Dayana-2006"/><br />
        <sub><b>Karol-Dayana-2006</b></sub>
      </a>
    </td>
        <td align="center">
      <a href="https://github.com/juanp356">
        <img src="https://github.com/juanp356.png" width="100px;" alt="juanp356"/><br />
        <sub><b>juanp356</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/NicolleMelendez">
        <img src="https://github.com/NicolleMelendez.png" width="100px;" alt="Nicolle Melendez"/><br />
        <sub><b>Nicolle Melendez</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/Jhon-Zuluaga">
        <img src="https://github.com/Jhon-Zuluaga.png" width="100px;" alt="Jhon-Zuluaga"/><br />
        <sub><b>Jhon-Zuluaga</b></sub>
      </a>
    </td>
  </tr>
</table>


# 📫 Contacto

- Email: [software.clem@gmail.com](mailto:software.clem@gmail.com)
- Proyecto: [https://github.com/anfeles85/stocklem-sena](https://github.com/anfeles85/stocklem-sena)

# 📄 Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo LICENSE para detalles.




