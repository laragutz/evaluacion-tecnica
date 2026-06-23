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

