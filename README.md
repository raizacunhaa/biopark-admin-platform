# 🦁 Biopark Admin Platform

Plataforma web administrativa desarrollada para la gestión de un bioparque.

El proyecto permite administrar diferentes áreas y recursos del sistema mediante operaciones CRUD, integrando una aplicación web desarrollada con PHP, MongoDB, JavaScript y Bootstrap.

## 📋 Descripción

Biopark Admin Platform es una plataforma de administración diseñada para centralizar la gestión de información relacionada con un bioparque.

El sistema permite registrar, visualizar, editar y eliminar información de diferentes entidades, facilitando la organización y administración de los datos almacenados en una base de datos MongoDB.

Durante el desarrollo se implementaron operaciones CRUD para los diferentes módulos del sistema, además de modales para la creación, edición y eliminación de registros.

## ✨ Funcionalidades

* Gestión de hábitats.
* Gestión de especies.
* Gestión de zonas.
* Gestión de veterinarios.
* Gestión de cuidadores.
* Gestión de guías.
* Gestión de itinerarios.
* Visualización de información comercial.
* Creación de nuevos registros.
* Edición de registros existentes.
* Eliminación de registros.
* Modales para las operaciones CRUD.
* Alertas de confirmación después de crear, actualizar o eliminar registros.
* Integración con MongoDB.

## 🧩 Módulos del sistema

### 🏠 Hábitats

Permite gestionar la información relacionada con los hábitats del bioparque.

### 🐾 Especies

Permite administrar las especies registradas en el sistema.

### 📍 Zonas

Permite gestionar las diferentes zonas del bioparque.

### 🩺 Veterinarios

Permite registrar y administrar los veterinarios y su relación con zonas y hábitats.

### 👨‍🌾 Cuidadores

Permite gestionar los cuidadores y las especies asignadas a cada uno, incluyendo la fecha de asignación.

### 🧭 Guías

Permite administrar la información de los guías del bioparque.

### 🗺️ Itinerarios

Permite gestionar los itinerarios disponibles, incluyendo información como:

* Código.
* Duración.
* Longitud.
* Cantidad máxima de visitantes.
* Zonas incluidas.
* Guías asignados.

### 📊 Gestión comercial

Permite visualizar información relacionada con entradas y registros comerciales almacenados en la base de datos.

## 🛠️ Tecnologías utilizadas

* **PHP**
* **MongoDB**
* **MongoDB PHP Library**
* **JavaScript**
* **Bootstrap 5**
* **HTML5**
* **CSS3**
* **Composer**
* **Git**
* **GitHub**

## 📁 Estructura del proyecto

```text
biopark-admin-platform/
│
├── actions/
│   ├── crear_*.php
│   ├── editar_*.php
│   └── eliminar_*.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   │
│   └── js/
│       └── app.js
│
├── config/
│   └── conexion.php
│
├── partials/
│   ├── header.php
│   ├── sidebar.php
│   └── footer.php
│
├── views/
│   ├── dashboard.php
│   ├── habitats.php
│   ├── especies.php
│   ├── zonas.php
│   ├── veterinarios.php
│   ├── cuidadores.php
│   ├── guias.php
│   ├── itinerarios.php
│   └── gestion_comercial.php
│
├── composer.json
├── composer.lock
└── index.php
```

## ⚙️ Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/raizacunhaa/biopark-admin-platform.git
```

### 2. Acceder a la carpeta del proyecto

```bash
cd biopark-admin-platform
```

### 3. Instalar las dependencias

La carpeta `vendor` no está incluida en el repositorio, por lo que es necesario instalar las dependencias utilizando Composer:

```bash
composer install
```

### 4. Configurar MongoDB

El proyecto utiliza MongoDB como base de datos.

La conexión se encuentra configurada en:

```text
config/conexion.php
```

La aplicación utiliza la base de datos:

```text
Zoologico
```

Es necesario tener MongoDB ejecutándose localmente antes de iniciar el proyecto.

### 5. Ejecutar el proyecto

El proyecto puede ejecutarse utilizando un servidor local como XAMPP.

Colocar el proyecto dentro de:

```text
xampp/htdocs/
```

Luego acceder desde el navegador a:

```text
http://localhost/biopark-admin-platform/
```

## 📸 Capturas de pantalla

### Dashboard

<img width="1901" height="643" alt="Captura de pantalla 2026-08-13 162858" src="https://github.com/user-attachments/assets/5d911410-434e-49ba-9b1e-db0a7d920cdd" />


### Gestión de Hábitats

<img width="1895" height="541" alt="Captura de pantalla 2026-08-13 162911" src="https://github.com/user-attachments/assets/a0644f29-1340-49d2-83c7-3993437afd79" />


## 👩‍💻 Autora

**Raiza Cunha**

Desarrolladora de software en formación, con interés en desarrollo web, backend y ciencia de datos.

GitHub: https://github.com/raizacunhaa

LinkedIn: https://www.linkedin.com/in/raizacunhaa/
