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
- [👩‍💻 Autores](#autores)
- [📫 Contacto](#contacto)
- [📄 Licencia](#licencia)

## 🚀 Inicio rápido

Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y testing.

## 🛠️ Prerequisitos

Qué necesitas para instalar el software:<br>
    PHP >= 8.1<br>
    Composer >= 2.0<br>
    Node.js >= 16.x<br>
    NPM >= 8.x<br>
    MySQL >= 8.0<br>
    Git<br>


## ⚙️ Instalación

Paso a paso para tener el entorno de desarrollo ejecutándose:<br>

1. Clonar el repositorio<br>

  git clone https://github.com/anfeles85/stocklem-sena.git<br>
  ``` 
  cd stocklem-sena<br> 
```

2. Instalar dependencias PHP<br>

  ```composer install```<br>


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
  DB_CONNECTION=mysql<br>
  DB_HOST=127.0.0.1<br>
  DB_PORT=3306<br>
  DB_DATABASE=stocklem_db<br>
  DB_USERNAME=tu_usuario<br>
  DB_PASSWORD=tu_contraseña<br>

```
6. Generar key de aplicación
```
  php artisan key:generate
```
7. Ejecutar migraciones<br>
```
  php artisan migrate<br>

```
8. Compilar assets<br>
```
  npm run dev<br>
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

CRUD completo para empleados
Roles y permisos personalizables
Control de acceso por niveles

🏪 Administración de Proveedores

Registro y seguimiento de proveedores


📦 Control de Inventario

Gestión completa de artículos
Registro de entradas y salidas
Sistema de categorías y subcategorías
Control de stock mínimo

🐷 Gestión Pecuaria

Control específico de cerdos
Seguimiento de salud y alimentación
Registro de nacimientos y defunciones

📈 Reportes Avanzados

Generación automática de reportes
Exportación a PDF


📱 Diseño Responsivo

Interfaz adaptable a dispositivos móviles
Experiencia de usuario optimizada
Tema moderno y profesional


## 🏗️ Construido con

- Laravel 10 - Framework PHP
- PHP 8.1 - Lenguaje de programación
- MySQL - Base de datos
- Bootstrap - Framework CSS
- JavaScript - Lenguaje frontend
- Vite - Build tool
- Composer - Gestor de dependencias PHP
- NPM - Gestor de paquetes Node.js

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
📋 Términos de Uso:

✅ Permitido:

- Uso interno en la granja CLEM

- Fines educativos y operativos

- Modificaciones para mejora continua

❌ Prohibido:

- Uso fuera del SENA CLEM

- Distribución externa no autorizada

- Fines comerciales<br>

🏛️ Propiedad Intelectual:
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



