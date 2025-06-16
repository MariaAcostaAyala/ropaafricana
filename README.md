# ROPA AFRICANA - Tienda Online

## Descripción
ROPAAFRICANA es una plataforma de comercio electrónico especializada en la venta de ropa africana. 
El sistema está construido con PHP y utiliza una arquitectura moderna que separa el frontend del backend.

## Características Principales

### Gestión de Usuarios
- Registro e inicio de sesión de usuarios
- Recuperación de contraseña
- Gestión de perfiles de usuario
- Sistema de roles y permisos

### Catálogo de Productos
- Visualización de productos con paginación
- Filtros por categoría
- Búsqueda avanzada
- Detalles completos de productos (imágenes, descripción, precio, stock)
- Sistema de valoraciones y comentarios

### Carrito de Compras
- Gestión completa del carrito
- Modificación de cantidades
- Cálculo de totales en tiempo real
- Persistencia de datos del carrito
- Integración con pasarelas de pago

### Panel de Administración
- Interfaz moderna basada en AdminLTE 3
- Gestión de productos y categorías
- Control de inventario
- Gestión de pedidos
- Estadísticas y reportes

## Requisitos Técnicos
- PHP 7.0 o superior
- MySQL/MariaDB
- Servidor web Apache/Nginx
- Composer para gestión de dependencias

## Estructura del Proyecto
```
ROPAAFRICANA/
├── app/              # Lógica principal de la aplicación
├── backend/          # Panel de administración
├── frontend/         # Interfaz de usuario
├── Initialize/       # Scripts de inicialización
└── Documentacion/   # Documentación del proyecto
```

## Instalación
1. Clonar el repositorio
2. Configurar la base de datos en `app/config/database.php`
3. Ejecutar los scripts de inicialización desde `http://localhost/ROPAAFRICANA/frontend/initialize`
4. Configurar los permisos de directorios según sea necesario

## Tecnologías Utilizadas
- PHP
- MySQL
- Bootstrap 4
- AdminLTE
- jQuery
- DataTables
- PHPMailer

## Seguridad
- Implementación de OAuth 2.0
- Protección contra XSS
- Validación de datos
- Encriptación de contraseñas
- Tokens CSRF

## Licencia
Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## Soporte
Para soporte técnico o consultas, por favor contactar al equipo de desarrollo. 