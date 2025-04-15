# Ticket Management System

Este proyecto es un sistema de gestión de tickets desarrollado en PHP utilizando XAMPP como servidor local. Proporciona una solución para la creación, seguimiento y resolución de tickets de soporte.

## Estructura del Proyecto

```
/c:/xampp/htdocs/Ticket/
├── index.php          # Página principal del sistema
├── css/               # Archivos estáticos (CSS)
├── js/                # Archivos estáticos (JS)
├── images/            # Imagenes del proyecto
├── controllers/       # Controladores del Proyecto
├── models/            # Modelos del Proyecto
├── views/             # Vistas del Proyecto
├── security/          # Seguridad del Proyecto anti-scraping
├── includes/          # Archivos comunes (header, footer, conexión a la base de datos)
└── database/          # Scripts SQL para la base de datos
```

## Funcionalidades

1. **Creación de Tickets**: Los usuarios pueden crear tickets proporcionando detalles como título, descripción y prioridad.
2. **Listado de Tickets**: Visualización de todos los tickets creados con filtros por estado (abierto, en progreso, cerrado).
3. **Detalles del Ticket**: Visualización de información detallada de un ticket, incluyendo historial de actualizaciones.
4. **Actualización de Estado**: Cambiar el estado de un ticket según el progreso.

## Requisitos

- **Servidor Local**: XAMPP o similar.
- **PHP**: Versión 7.4 o superior.
- **Base de Datos**: MySQL.

## Instalación

1. Clona este repositorio en el directorio de tu servidor local:
   ```bash
   git clone https://github.com/usuario/ticket-management.git
   ```
2. Importa el archivo SQL en tu base de datos MySQL desde `database/schema.sql`.
3. Configura la conexión a la base de datos en `includes/db_connection.php`.
4. Accede al proyecto desde tu navegador en `http://localhost/Ticket`.

## Contribución

1. Haz un fork del repositorio.
2. Crea una rama para tu funcionalidad (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza un pull request describiendo tus cambios.

## Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo [Licencia MIT](LICENSE.txt) para más detalles.

## Contacto

Para preguntas o soporte, contacta al desarrollador en [gercermagden@gmail.com](mailto:gercermagden@gmail.com).