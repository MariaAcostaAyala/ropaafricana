# Página de Inicialización del Sistema

## Descripción
La página de inicialización del sistema (`http://localhost/ROPAAFRICANA/frontend/initialize`) es una herramienta fundamental para configurar la base de datos del sistema. Esta página proporciona tres opciones principales para gestionar la base de datos de manera segura y organizada.

## Acceso
Para acceder a la página de inicialización, utiliza la siguiente URL:
```
http://localhost/ROPAAFRICANA/frontend/initialize
```

## Funcionalidades

### 1. Inicializar Base de Datos
- **Propósito**: Limpia completamente la base de datos eliminando todas las tablas existentes.
- **Uso**: Útil cuando se necesita empezar desde cero o corregir problemas estructurales.
- **Precaución**: Este proceso eliminará todos los datos existentes. Úsalo con precaución.

### 2. Crear Tablas sin datos
- **Propósito**: Crea la estructura completa de la base de datos sin insertar datos de ejemplo.
- **Uso**: Ideal para instalaciones limpias donde se desea configurar los datos manualmente.
- **Incluye**: Crea todas las tablas necesarias con sus respectivas relaciones y restricciones.

### 3. Crear Tablas y datos
- **Propósito**: Crea la estructura de la base de datos y carga datos de ejemplo.
- **Uso**: Recomendado para pruebas o instalaciones iniciales.
- **Datos incluidos**:
  - Productos de ejemplo
  - Categorías y subcategorías
  - Usuarios de prueba
  - Configuraciones básicas
  - Banners y slides
  - Información de comercio

## Proceso de Instalación Recomendado

1. **Paso 1**: Inicializar Base de Datos
   - Hacer clic en el botón "Inicializar Base de Datos"
   - Confirmar la acción cuando se solicite
   - Esperar el mensaje de confirmación

2. **Paso 2**: Elegir una de las siguientes opciones:
   - **Opción A**: Crear Tablas sin datos
     - Si se desea una instalación limpia
     - Para configurar los datos manualmente
   - **Opción B**: Crear Tablas y datos
     - Si se desea una instalación con datos de ejemplo
     - Para pruebas y desarrollo

## Estructura de la Base de Datos

Las siguientes tablas se crean durante el proceso de inicialización:

- `administradores`: Gestión de administradores del sistema
- `banner`: Banners publicitarios
- `cabeceras`: Configuración de cabeceras
- `categorias`: Categorías de productos
- `comercio`: Configuración general del comercio
- `comentarios`: Comentarios de usuarios
- `compras`: Registro de compras
- `deseos`: Lista de deseos de usuarios
- `plantilla`: Configuración de la plantilla
- `productos`: Catálogo de productos
- `slide`: Slides publicitarios
- `subcategorias`: Subcategorías de productos
- `usuarios`: Registro de usuarios
- `visitaspaises`: Estadísticas de visitas por país
- `visitaspersonas`: Estadísticas de visitas individuales

## Notas Importantes

1. **Respaldo**: Siempre es recomendable hacer un respaldo de la base de datos antes de realizar cualquier operación de inicialización.

2. **Orden de Operaciones**: Es importante seguir el orden correcto de los pasos para evitar problemas en la estructura de la base de datos.

3. **Datos de Ejemplo**: Los datos de ejemplo incluidos son útiles para pruebas, pero deben ser reemplazados con datos reales en un entorno de producción.

4. **Permisos**: Asegúrese de que el usuario de la base de datos tenga los permisos necesarios para crear y modificar tablas.

## Solución de Problemas

Si encuentras algún error durante el proceso de inicialización:

1. Verifica que el archivo `ecomerce.sql` existe en la carpeta `Initialize`
2. Comprueba los permisos de la base de datos
3. Revisa los mensajes de error en el panel de resultados
4. Asegúrate de que la base de datos está accesible y configurada correctamente 