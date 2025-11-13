<div align="center">
  <img src="https://github.com/anfeles85/stocklem-sena/blob/dev/stocklem/public/img/stockclem-logo.png" alt="Stocklem Logo" width="350"/><br>

</div> <br>
   <h1> 🌱 
Stocklem</h1><br>Sistema de gestión de inventario para la granja CLEM desarrollado con Laravel y MySql, especializado en el control de los cerdos, personal, gestion de proveedores, gestion de entradas y salidas de los articulos para la granja SENA CLEM.

## 📚 Tabla de Contenido

- [🚀 Inicio rápido](#Inicio-rápido)
- [🛠️ Prerequisitos](#prerequisitos)
- [⚙️ Instalación](#instalacion)
- [✨ Características](#Características)
- [🏗️ Construido con](#Construido-con)
- [📚 Dependencias y Librerías Utilizadas](#Dependencias-y-Librerías-Utilizadas)
- [👩‍💻 Autores](#autores)
- [📫 Contacto](#contacto)
- [📄 Licencia](#licencia)

## 🚀 Inicio rápido

Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y testing.

## 🛠️ Prerequisitos

Qué necesitas para instalar el software:
<br>
  - PHP >= 8.1
   - Composer >= 2.0
   - Node.js >= 16.x
   - NPM >= 8.x
   - MySQL >= 8.0
   - Git


## ⚙️ Instalación

Paso a paso para tener el entorno de desarrollo ejecutándose:<br>

1. Clonar el repositorio<br>

  git clone https://github.com/anfeles85/stocklem-sena.git<br>
  ``` 
  cd stocklem-sena<br> 
```

2. Instalar dependencias PHP<br>

  ```
    composer install
  ```


3. Instalar dependencias Node.js<br>
```
  npm install
```
4. Configurar variables de entorno<br>
```
  cp .env.example .env
```

5. Configurar base de datos en `.env`<br>
```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=stocklem_db
  DB_USERNAME=tu_usuario
  DB_PASSWORD=tu_contraseña

```
6. Generar key de aplicación
```
  php artisan key:generate
```
7. Ejecutar migraciones<br>
```
  php artisan migrate

```
8. Compilar assets<br>
```
  npm run dev
```
9. Iniciar servidor<br>
```
  php artisan serve
```

## ✨ Características

📊 Panel de Control

Dashboard interactivo con métricas en tiempo real
Gráficos y estadísticas de inventario
Alertas y notificaciones automáticas

👥 Gestión de Personas

- CRUD completo para empleados
- Roles y permisos personalizables
- Control de acceso por niveles

🏪 Administración de Proveedores

- Registro y seguimiento de proveedores


📦 Control de Inventario

- Gestión completa de artículos
- Registro de entradas y salidas
- Sistema de categorías y subcategorías
- Control de stock mínimo

🐷 Gestión Pecuaria

- Control específico de cerdos
- Seguimiento de salud y alimentación
- Registro de nacimientos y defunciones

📈 Reportes Avanzados

- Generación automática de reportes
- Exportación a PDF


📱 Diseño Responsivo

- Interfaz adaptable a dispositivos móviles
- Experiencia de usuario optimizada
- Tema moderno y profesional


## 🏗️ Construido con

* [![Laravel][Laravel.com]][Laravel-url]
* [![PHP][PHP.net]][PHP-url]
* [![MySQL][MySQL.com]][MySQL-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![JavaScript][JavaScript.com]][JavaScript-url]
* [![Composer][Composer.org]][Composer-url]

## 📚 Dependencias y Librerías Utilizadas

A continuación se detallan las principales dependencias empleadas y desarrolladas en el proyecto, organizadas por entorno y tecnología.

---

### ⚡️ Dependencias / Librerías JavaScript

| Paquete | Versión | Descripción breve |
|----------|----------|------------------|
| **axios** | ^1.6.4 | Cliente HTTP basado en promesas para realizar peticiones a APIs. |
| **laravel-vite-plugin** | ^1.0.0 | Integración entre Laravel y Vite para la compilación de assets. |
| **vite** | ^5.0.0 | Herramienta de construcción rápida y moderna para JavaScript. |

---

### 🧩 Dependencias / Librerías Laravel

#### 🏗️ require (Producción)
| Paquete | Versión | Descripción breve |
|----------|----------|------------------|
| **anhskohbo/no-captcha** | ^3.7 | Implementación de Google reCAPTCHA en Laravel. |
| **barryvdh/laravel-dompdf** | ^3.1 | Generación de documentos PDF desde vistas Blade. |
| **guzzlehttp/guzzle** | ^7.2 | Cliente HTTP para realizar solicitudes externas. |
| **laravel/framework** | ^10.10 | Framework principal del proyecto. |
| **laravel/sanctum** | ^3.3 | Autenticación ligera basada en tokens para SPAs y APIs. |
| **laravel/tinker** | ^2.8 | Consola interactiva REPL para Laravel. |
| **maatwebsite/excel** | ^3.1 | Exportación e importación de archivos Excel. |

#### 🧪 require-dev (Desarrollo)
| Paquete | Versión | Descripción breve |
|----------|----------|------------------|
| **fakerphp/faker** | ^1.9.1 | Generador de datos falsos para pruebas. |
| **laravel/pint** | ^1.0 | Herramienta de formateo de código conforme a PSR-12. |
| **laravel/sail** | ^1.18 | Entorno de desarrollo con Docker para Laravel. |
| **mockery/mockery** | ^1.4.4 | Librería para crear mocks en pruebas unitarias. |
| **nunomaduro/collision** | ^7.0 | Manejo elegante de errores y excepciones en consola. |
| **phpunit/phpunit** | ^10.1 | Framework de pruebas unitarias para PHP. |
| **spatie/laravel-ignition** | ^2.0 | Mejoras en la visualización y depuración de errores. |

---


## 👩‍💻 Autores

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


## 📫 Contacto

- Email: [software.clem@gmail.com](mailto:software.clem@gmail.com)
- Proyecto: [https://github.com/anfeles85/stocklem-sena](https://github.com/anfeles85/stocklem-sena)
  
- SENA - <a href="https://portal.senasofiaplus.edu.co/">Servicio Nacional de Aprendizaje</a>
Centro Latinoamericano de Especies Menores
</br>

## 📄 Licencia
SENA - Servicio Nacional de Aprendizaje
Este proyecto es desarrollado como parte del programa de formación en Tecnología en Análisis y Desarrollo de Software del SENA.
<br><br>
📋 Términos de Uso:

✅ Permitido:

- Uso interno en la granja CLEM

- Fines educativos y operativos

- Modificaciones para mejora continua

❌ Prohibido:

- Uso fuera del SENA CLEM

- Distribución externa no autorizada

- Fines comerciales<br>

🏛️**Propiedad Intelectual**:
Los derechos de este proyecto pertenecen al SENA y fueron desarrollados por estudiantes en formación como parte de su proceso educativo.
Para consultas sobre licenciamiento comercial, contactar al SENA - Centro Latinoamericano de Especies Menores.
<div align="center">
🌟 ¡Gracias por tu interés en Stocklem!
Desarrollado con ❤️ por estudiantes del SENA

© 2025 SENA - Servicio Nacional de Aprendizaje. Proyecto educativo desarrollado por estudiantes en formación.
</div>

<div align="center">
  <img src="https://github.com/anfeles85/stocklem-sena/blob/dev/stocklem/public/img/sena-logo.png" alt="SENA Logo" width="200"/><br>

</div> 

<!---  LINKS Y IMAGES-->

[Laravel.com]: https://img.shields.io/badge/Laravel-10-red?style=flat&logo=laravel
[Laravel-url]: https://laravel.com/

[PHP.net]: https://img.shields.io/badge/PHP-8.1-blue?style=flat&logo=php
[PHP-url]: https://www.php.net/

[MySQL.com]: https://img.shields.io/badge/MySQL-8.0-blue?style=flat&logo=mysql
[MySQL-url]: https://www.mysql.com/

[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-5-orange?style=flat&logo=bootstrap
[Bootstrap-url]: https://getbootstrap.com/

[JavaScript.com]: https://img.shields.io/badge/JavaScript-yellow?style=flat&logo=javascript
[JavaScript-url]: https://developer.mozilla.org/es/docs/Web/JavaScript



[Composer.org]: https://img.shields.io/badge/Composer-black?style=flat&logo=composer
[Composer-url]: https://getcomposer.org/

