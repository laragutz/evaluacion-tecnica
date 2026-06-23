# Evaluación Técnica - Laravel 13 + PostgreSQL

## Descripción

Aplicación web desarrollada en Laravel 13 para la gestión de productos.

La solución incluye:

* CRUD completo de productos.
* Migración de datos desde un respaldo MySQL hacia PostgreSQL.
* Búsqueda por nombre, SKU y categoría.
* Paginación de resultados.
* Exportación a Excel (.xlsx).
* Despliegue en Ubuntu 24.04 con Nginx y PHP-FPM.
* Control de versiones mediante Git y GitHub.

---

## Tecnologías Utilizadas

* Ubuntu 24.04 LTS
* PHP 8.3
* Laravel 13
* PostgreSQL 16
* Nginx
* Bootstrap 5
* Laravel Excel (Maatwebsite)
* Git

---

## URL de la Aplicación

http://143.198.75.69

---

## Instalación

### Clonar repositorio

```bash
git clone git@github.com:laragutz/evaluacion-tecnica.git
cd evaluacion-tecnica
```

### Instalar dependencias

```bash
composer install
```

### Crear archivo de entorno

```bash
cp .env.example .env
```

### Generar clave de aplicación

```bash
php artisan key:generate
```

### Configurar PostgreSQL

Editar `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=evaluacion_tecnica
DB_USERNAME=evaluacion_user
DB_PASSWORD=********
```

### Ejecutar migraciones

```bash
php artisan migrate
```

### Ejecutar seeders

```bash
php artisan db:seed --class=ProductoSeeder
```

---

## Exportación Excel

La aplicación permite exportar el catálogo de productos mediante:

```text
Botón "Exportar Excel"
```

o mediante la ruta:

```text
/productos-exportar
```

---

## Respaldo PostgreSQL

## Procedimiento de Migración de MySQL a PostgreSQL

### Origen de los datos

Se proporcionó un archivo de respaldo denominado:

```text
respaldo_origen.sql
```

El archivo contenía la definición de una base de datos MySQL denominada `tienda_origen`, una tabla llamada `productos` y 15 registros de información.

### Análisis de la estructura

Se realizó la revisión de la estructura original identificando los siguientes campos:

| Campo          | Tipo MySQL         |
| -------------- | ------------------ |
| id             | INT AUTO_INCREMENT |
| nombre         | VARCHAR(150)       |
| sku            | VARCHAR(50)        |
| categoria      | VARCHAR(100)       |
| precio         | DECIMAL(10,2)      |
| stock          | INT                |
| activo         | TINYINT(1)         |
| fecha_registro | DATETIME           |

### Conversión de tipos hacia PostgreSQL

La estructura fue adaptada a PostgreSQL utilizando una migración Laravel.

| MySQL              | PostgreSQL    |
| ------------------ | ------------- |
| INT AUTO_INCREMENT | BIGSERIAL     |
| VARCHAR            | VARCHAR       |
| DECIMAL(10,2)      | NUMERIC(10,2) |
| TINYINT(1)         | BOOLEAN       |
| DATETIME           | TIMESTAMP     |

### Creación de la estructura

Se generó una migración Laravel para crear la tabla `productos` dentro de PostgreSQL.

Posteriormente se ejecutó:

```bash
php artisan migrate
```

### Migración de los datos

Los registros contenidos en el archivo SQL original fueron trasladados mediante un Seeder Laravel denominado:

```text
ProductoSeeder
```

La carga fue ejecutada mediante:

```bash
php artisan db:seed --class=ProductoSeeder
```

### Validación de integridad

Después de la migración se verificó:

* Existencia de los 15 registros originales.
* Integridad de claves primarias.
* Restricción única sobre el campo SKU.
* Correcto funcionamiento de operaciones CRUD.
* Correcto funcionamiento de búsquedas y exportación Excel.
* Correcta sincronización de la secuencia PostgreSQL utilizada para la generación de identificadores.

Generar respaldo:

```bash
pg_dump -h localhost -U evaluacion_user -d evaluacion_tecnica -F c -f evaluacion_tecnica.backup
```

Restaurar respaldo:

```bash
pg_restore -h localhost -U evaluacion_user -d evaluacion_tecnica evaluacion_tecnica.backup
```

---

## Funcionalidades Implementadas

### Productos

* Listar productos
* Buscar productos
* Crear productos
* Ver detalle
* Editar productos
* Eliminar productos
* Exportar a Excel

---

## Autor

Alejandro Lara Gutiérrez
GitHub: https://github.com/laragutz

