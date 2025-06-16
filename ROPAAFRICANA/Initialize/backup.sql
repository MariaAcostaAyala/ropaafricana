-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2025 a las 17:40:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12
-- Última versión

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ropaafricana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL,
  `password` text NOT NULL,
  `perfil` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `foto`, `password`, `perfil`, `fecha`) VALUES
(1, 'Tienda Ropa Africana', 'macosta27@gmail.com', '', '1234', 'superadministrador', '2025-06-07 08:16:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `img` text NOT NULL,
  `titulo1` text NOT NULL,
  `titulo2` text NOT NULL,
  `titulo3` text NOT NULL,
  `estilo` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `ruta`, `img`, `titulo1`, `titulo2`, `titulo3`, `estilo`, `fecha`) VALUES
(1, 'sin-categoria', 'vistas/img/banner/default.jpg', '{\r\n	\"texto\": \"OFERTAS ESPECIALES\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n	\"texto\": \"50% off\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n	\"texto\": \"Termina el 31 de Octubre\",\r\n	\"color\": \"#fff\"\r\n}', 'textoDer', '2025-06-12 18:14:41'),
(2, 'articulos-gratis', 'vistas/img/banner/ropa.jpg', '{\r\n	\"texto\": \"ARTÍCULOS GRATIS\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n\r\n	\"texto\": \"¡Entrega inmediata!\",\r\n\r\n	\"color\": \"#fff\"\r\n\r\n}', '{\r\n	\"texto\": \"Disfrútalo\",\r\n	\"color\": \"#fff\"\r\n}', 'textoIzq', '2025-06-12 18:05:43'),
(3, 'desarrollo-web', 'vistas/img/banner/web.jpg', '{\r\n	\"texto\": \"OFERTAS ESPECIALES\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n\r\n	\"texto\": \"50% off\",\r\n\r\n	\"color\": \"#fff\"\r\n\r\n}', '{\r\n	\"texto\": \"Termina el 31 de Octubre\",\r\n	\"color\": \"#fff\"\r\n}', 'textoCentro', '2025-06-12 18:05:43'),
(4, 'ropa-para-hombre', 'vistas/img/banner/ropaHombre.jpg', '{\r\n	\"texto\": \"OFERTAS ESPECIALES\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n\r\n	\"texto\": \"50% off\",\r\n\r\n	\"color\": \"#fff\"\r\n\r\n}', '{\r\n	\"texto\": \"Termina el 31 de Octubre\",\r\n	\"color\": \"#fff\"\r\n}', 'textoDer', '2025-06-12 18:06:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabeceras`
--

CREATE TABLE `cabeceras` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `palabrasClaves` text NOT NULL,
  `portada` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cabeceras`
--

INSERT INTO `cabeceras` (`id`, `ruta`, `titulo`, `descripcion`, `palabrasClaves`, `portada`, `fecha`) VALUES
(1, 'inicio', 'Tienda Virtual', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam accusantium enim esse eos officiis sit officia', 'Lorem ipsum, dolor sit amet, consectetur, adipisicing, elit, Quisquam, accusantium, enim, esse', 'vistas/img/cabeceras/default.jpg', '2025-06-17 13:58:16'),
(2, 'desarrollo-web', 'Desarrollo Web', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam accusantium enim esse eos officiis sit officia', 'Lorem ipsum, dolor sit amet, consectetur, adipisicing, elit, Quisquam, accusantium, enim, esse', 'vistas/img/cabeceras/web.jpg', '2025-06-17 13:59:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `ruta` text NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text NOT NULL,
  `finOferta` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `ruta`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `fecha`) VALUES
(1, 'ROPA AFRICANA', 'ropa-africana', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Calzado', 'calzado', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `calificacion` float NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `impuesto` float NOT NULL,
  `envioNacional` float NOT NULL,
  `envioInternacional` float NOT NULL,
  `tasaMinimaNal` float NOT NULL,
  `tasaMinimaInt` float NOT NULL,
  `pais` text NOT NULL,
  `modoPaypal` text NOT NULL,
  `clienteIdPaypal` text NOT NULL,
  `llaveSecretaPaypal` text NOT NULL,
  `modoPayu` text NOT NULL,
  `merchantIdPayu` int(11) NOT NULL,
  `accountIdPayu` int(11) NOT NULL,
  `apiKeyPayu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `impuesto`, `envioNacional`, `envioInternacional`, `tasaMinimaNal`, `tasaMinimaInt`, `pais`, `modoPaypal`, `clienteIdPaypal`, `llaveSecretaPaypal`, `modoPayu`, `merchantIdPayu`, `accountIdPayu`, `apiKeyPayu`) VALUES
(1, 21, 8, 15, 10, 15, 'MX', 'live', 'AecffvSZfOgj6g1MkrVmz12ACMES2-InggmWCpU5CblR-z5WwkYBYjmLsh9yPRLuRape1ahjqpcJet4N', 'EAx1SVMHGV6MJKwl-pnOSzaJASlAINZdYRdS--wkgaPYLevcGw88V0PU_W_rg00xLkBknybCjsO_xzA0', 'live', 508029, 512321, '4Vj8eK4rloUd272L48hsrarnUA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `envio` int(11) NOT NULL,
  `metodo` text NOT NULL,
  `email` text NOT NULL,
  `direccion` text NOT NULL,
  `pais` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `detalle` text DEFAULT NULL,
  `pago` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `empresa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`empresa`)),
  `contacto` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`contacto`)),
  `mapa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`mapa`)),
  `configuracion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`configuracion`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `empresa`, `contacto`, `mapa`, `configuracion`, `created_at`, `updated_at`, `email`) VALUES
(1, '{\"slogan\":\"Tu tienda online de confianza\",\"compania\":\"Mi Tienda\"}', '{\"telefono\":\"+1234567890\",\"email\":\"contacto@mitienda.com\",\"direccion\":\"Calle Principal 123\",\"ciudad\":\"Ciudad\",\"pais\":\"Pa\\u00eds\"}', '{\"titulo\":\"Nuestra Ubicaci\\u00f3n\",\"direccion_completa\":\"Calle Principal 123, Ciudad, Pa\\u00eds\",\"zoom\":15,\"tipo_mapa\":\"roadmap\",\"idioma\":\"es\",\"region\":\"ES\",\"ancho\":\"100%\",\"alto\":\"300\",\"estilo\":\"border:0\"}', '{\"empresa\":{\"compania\":\"Mi Tienda\"}}', '2025-06-05 11:04:16', '2025-06-05 11:17:42', '{\"nombre_remitente\":\"Administrador\",\"email_remitente\":\"admin@example.com\",\"email_copia\":\"copia@example.com\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`id`, `id_usuario`, `id_producto`, `fecha`) VALUES
(1, 1, 38, '2025-06-12 10:41:25'),
(2, 1, 39, '2025-06-12 10:41:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL,
  `barraSuperior` text NOT NULL,
  `textoSuperior` text NOT NULL,
  `colorFondo` text NOT NULL,
  `colorTexto` text NOT NULL,
  `logo` text NOT NULL,
  `icono` text NOT NULL,
  `redesSociales` text NOT NULL,
  `apiFacebook` text NOT NULL,
  `pixelFacebook` text NOT NULL,
  `googleAnalytics` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `barraSuperior`, `textoSuperior`, `colorFondo`, `colorTexto`, `logo`, `icono`, `redesSociales`, `apiFacebook`, `pixelFacebook`, `googleAnalytics`, `fecha`) VALUES
(1, '#000000', '#ffffff', '#f1c275', '#ffffff', 'vistas/img/plantilla/logo.jpg', 'vistas/img/plantilla/icono.png', '[{\"red\":\"fa-facebook\",\"estilo\":\"facebookColor\",\"url\":\"http://facebook.com/\",\"activo\":1},{\"red\":\"fa-youtube\",\"estilo\":\"youtubeColor\",\"url\":\"http://youtube.com/\",\"activo\":1},{\"red\":\"fa-twitter\",\"estilo\":\"twitterColor\",\"url\":\"http://twitter.com/\",\"activo\":1},{\"red\":\"fa-google-plus\",\"estilo\":\"google-plusColor\",\"url\":\"http://google.com/\",\"activo\":1},{\"red\":\"fa-instagram\",\"estilo\":\"instagramColor\",\"url\":\"http://instagram.com/\",\"activo\":1}]', '<script>   window.fbAsyncInit = function() {     FB.init({       appId      : \'131737410786111\',       cookie     : true,       xfbml      : true,       version    : \'v2.10\'     });            FB.AppEvents.logPageView();             };    (function(d, s, id){      var js, fjs = d.getElementsByTagName(s)[0];      if (d.getElementById(id)) {return;}      js = d.createElement(s); js.id = id;      js.src = \"https://connect.facebook.net/en_US/sdk.js\";      fjs.parentNode.insertBefore(js, fjs);    }(document, \'script\', \'facebook-jssdk\'));  </script>', '<!-- Facebook Pixel Code --> 	<script> 	  !function(f,b,e,v,n,t,s) 	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod? 	  n.callMethod.apply(n,arguments):n.queue.push(arguments)}; 	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\'; 	  n.queue=[];t=b.createElement(e);t.async=!0; 	  t.src=v;s=b.getElementsByTagName(e)[0]; 	  s.parentNode.insertBefore(t,s)}(window, document,\'script\', 	  \'https://connect.facebook.net/en_US/fbevents.js\'); 	  fbq(\'init\', \'131737410786111\'); 	  fbq(\'track\', \'PageView\'); 	</script> 	<noscript><img height=\"1\" width=\"1\" style=\"display:none\" 	  src=\"https://www.facebook.com/tr?id=149877372404434&ev=PageView&noscript=1\" 	/></noscript> <!-- End Facebook Pixel Code -->', '        \r\n            \r\n            \r\n            \r\n  			      \r\n  			      \r\n  			', '2025-06-05 17:55:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `titular` text NOT NULL,
  `descripcion` text NOT NULL,
  `multimedia` text NOT NULL,
  `detalles` text NOT NULL,
  `precio` float NOT NULL,
  `portada` text NOT NULL,
  `vistas` int(11) NOT NULL,
  `ventas` int(11) NOT NULL,
  `vistasGratis` int(11) NOT NULL,
  `ventasGratis` int(11) NOT NULL,
  `ofertadoPorCategoria` int(11) NOT NULL,
  `ofertadoPorSubCategoria` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text NOT NULL,
  `finOferta` datetime NOT NULL,
  `nuevo` int(11) NOT NULL,
  `peso` float NOT NULL,
  `entrega` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `id_subcategoria`, `tipo`, `ruta`, `titulo`, `titular`, `descripcion`, `multimedia`, `detalles`, `precio`, `portada`, `vistas`, `ventas`, `vistasGratis`, `ventasGratis`, `ofertadoPorCategoria`, `ofertadoPorSubCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `nuevo`, `peso`, `entrega`, `fecha`) VALUES
(1, 1, 1, 'fisico', 'vestido-africano-1', 'Vestido Africano 1', 'Vestido Africano Tradicional', 'Vestido africano tradicional con estampados únicos y colores vibrantes.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_1.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Rojo\",\"Azul\",\"Verde\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_1.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.5, 0, '2025-06-06 18:37:16'),
(2, 1, 1, 'fisico', 'vestido-africano-2', 'Vestido Africano 2', 'Vestido Africano Moderno', 'Vestido africano con diseño moderno y confortable.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_2.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Negro\",\"Blanco\"],\"Material\":\"Algodón\"}', 59.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_2.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.45, 0, '2025-06-06 18:37:16'),
(3, 1, 1, 'fisico', 'vestido-africano-3', 'Vestido Africano 3', 'Vestido Africano Elegante', 'Vestido africano con diseño elegante y sofisticado.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_3.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Azul\",\"Verde\"],\"Material\":\"Algodón\"}', 54.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_3.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.48, 0, '2025-06-06 18:37:16'),
(4, 1, 1, 'fisico', 'vestido-africano-4', 'Vestido Africano 4', 'Vestido Africano Casual', 'Vestido africano perfecto para el día a día.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_4.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\"}', 44.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_4.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.42, 0, '2025-06-06 18:37:16'),
(5, 1, 1, 'fisico', 'vestido-africano-5', 'Vestido Africano 5', 'Vestido Africano Festivo', 'Vestido africano ideal para ocasiones especiales.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_5.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Amarillo\",\"Verde\"],\"Material\":\"Algodón\"}', 64.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_5.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.52, 0, '2025-06-06 18:37:16'),
(6, 1, 1, 'fisico', 'vestido-africano-6', 'Vestido Africano 6', 'Vestido Africano Verano', 'Vestido africano ligero para el verano.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_6.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Blanco\",\"Azul\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_6.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.4, 0, '2025-06-06 18:37:16'),
(7, 1, 1, 'fisico', 'vestido-africano-7', 'Vestido Africano 7', 'Vestido Africano Primavera', 'Vestido africano con colores primaverales.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_7.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Rosa\",\"Verde\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_7.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.45, 0, '2025-06-06 18:37:16'),
(8, 1, 1, 'fisico', 'vestido-africano-8', 'Vestido Africano 8', 'Vestido Africano Otoño', 'Vestido africano con tonos otoñales.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_8.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Marrón\",\"Naranja\"],\"Material\":\"Algodón\"}', 54.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_8.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.48, 0, '2025-06-06 18:37:16'),
(9, 1, 1, 'fisico', 'vestido-africano-9', 'Vestido Africano 9', 'Vestido Africano Invierno', 'Vestido africano para el invierno.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_9.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Negro\",\"Gris\"],\"Material\":\"Algodón\"}', 59.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_9.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.5, 0, '2025-06-06 18:37:16'),
(10, 1, 1, 'fisico', 'vestido-africano-10', 'Vestido Africano 10', 'Vestido Africano Clásico', 'Vestido africano con diseño clásico.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_10.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_10.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.45, 0, '2025-06-06 18:37:16'),
(11, 1, 1, 'fisico', 'vestido-africano-11', 'Vestido Africano 11', 'Vestido Africano Moderno', 'Vestido africano con toques modernos.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_11.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Azul\",\"Blanco\"],\"Material\":\"Algodón\"}', 54.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_11.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.48, 0, '2025-06-06 18:37:16'),
(12, 1, 1, 'fisico', 'vestido-africano-12', 'Vestido Africano 12', 'Vestido Africano Elegante', 'Vestido africano con diseño elegante.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_12.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Verde\",\"Negro\"],\"Material\":\"Algodón\"}', 59.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_12.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.5, 0, '2025-06-06 18:37:16'),
(13, 1, 1, 'fisico', 'vestido-africano-13', 'Vestido Africano 13', 'Vestido Africano Casual', 'Vestido africano para el día a día.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_13.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Blanco\"],\"Material\":\"Algodón\"}', 44.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_13.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.42, 0, '2025-06-06 18:37:16'),
(14, 1, 1, 'fisico', 'vestido-africano-14', 'Vestido Africano 14', 'Vestido Africano Festivo', 'Vestido africano para ocasiones especiales.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_14.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Amarillo\",\"Verde\"],\"Material\":\"Algodón\"}', 64.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_14.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.52, 0, '2025-06-06 18:37:16'),
(15, 1, 1, 'fisico', 'vestido-africano-15', 'Vestido Africano 15', 'Vestido Africano Verano', 'Vestido africano ligero para el verano.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_15.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Blanco\",\"Azul\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_15.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.4, 0, '2025-06-06 18:37:16'),
(16, 1, 1, 'fisico', 'vestido-africano-16', 'Vestido Africano 16', 'Vestido Africano Primavera', 'Vestido africano con colores primaverales.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_16.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Rosa\",\"Verde\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_16.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.45, 0, '2025-06-06 18:37:16'),
(17, 1, 1, 'fisico', 'vestido-africano-17', 'Vestido Africano 17', 'Vestido Africano Otoño', 'Vestido africano con tonos otoñales.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_17.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Marrón\",\"Naranja\"],\"Material\":\"Algodón\"}', 54.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_17.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.48, 0, '2025-06-06 18:37:16'),
(18, 1, 1, 'fisico', 'vestido-africano-18', 'Vestido Africano 18', 'Vestido Africano Invierno', 'Vestido africano para el invierno.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_18.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Negro\",\"Gris\"],\"Material\":\"Algodón\"}', 59.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_18.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.5, 0, '2025-06-06 18:37:16'),
(19, 1, 1, 'fisico', 'vestido-africano-19', 'Vestido Africano 19', 'Vestido Africano Clásico', 'Vestido africano con diseño clásico.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_19.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_19.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.45, 0, '2025-06-06 18:37:16'),
(20, 1, 1, 'fisico', 'vestido-africano-20', 'Vestido Africano 20', 'Vestido Africano Moderno', 'Vestido africano con toques modernos.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_20.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Azul\",\"Blanco\"],\"Material\":\"Algodón\"}', 54.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_20.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.48, 0, '2025-06-06 18:37:16'),
(21, 1, 1, 'fisico', 'vestido-africano-21', 'Vestido Africano 21', 'Vestido Africano Elegante', 'Vestido africano con diseño elegante.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_21.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Verde\",\"Negro\"],\"Material\":\"Algodón\"}', 59.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_21.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.5, 0, '2025-06-06 18:37:16'),
(22, 1, 1, 'fisico', 'vestido-africano-22', 'Vestido Africano 22', 'Vestido Africano Casual', 'Vestido africano para el día a día.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_22.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Blanco\"],\"Material\":\"Algodón\"}', 44.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_22.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.42, 0, '2025-06-06 18:37:16'),
(23, 1, 1, 'fisico', 'vestido-africano-23', 'Vestido Africano 23', 'Vestido Africano Festivo', 'Vestido africano para ocasiones especiales.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_23.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Amarillo\",\"Verde\"],\"Material\":\"Algodón\"}', 64.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_23.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.52, 0, '2025-06-06 18:37:16'),
(24, 1, 1, 'fisico', 'vestido-africano-24', 'Vestido Africano 24', 'Vestido Africano Verano', 'Vestido africano ligero para el verano.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_24.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Blanco\",\"Azul\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_24.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.4, 0, '2025-06-06 18:37:16'),
(25, 1, 1, 'fisico', 'vestido-africano-25', 'Vestido Africano 25', 'Vestido Africano Primavera', 'Vestido africano con colores primaverales.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_25.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Rosa\",\"Verde\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_25.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.45, 0, '2025-06-06 18:37:16'),
(26, 1, 1, 'fisico', 'vestido-africano-26', 'Vestido Africano 26', 'Vestido Africano Otoño', 'Vestido africano con tonos otoñales.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_26.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Marrón\",\"Naranja\"],\"Material\":\"Algodón\"}', 54.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_26.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.48, 0, '2025-06-06 18:37:16'),
(27, 1, 1, 'fisico', 'vestido-africano-27', 'Vestido Africano 27', 'Vestido Africano Invierno', 'Vestido africano para el invierno.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_27.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Negro\",\"Gris\"],\"Material\":\"Algodón\"}', 59.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_27.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.5, 0, '2025-06-06 18:37:16'),
(28, 1, 1, 'fisico', 'vestido-africano-28', 'Vestido Africano 28', 'Vestido Africano Clásico', 'Vestido africano con diseño clásico.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_28.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_28.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.45, 0, '2025-06-06 18:37:16'),
(29, 1, 1, 'fisico', 'vestido-africano-29', 'Vestido Africano 29', 'Vestido Africano Moderno', 'Vestido africano con toques modernos.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_29.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Azul\",\"Blanco\"],\"Material\":\"Algodón\"}', 54.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_29.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.48, 0, '2025-06-06 18:37:16'),
(30, 1, 1, 'fisico', 'vestido-africano-30', 'Vestido Africano 30', 'Vestido Africano Elegante', 'Vestido africano con diseño elegante.', '[\"vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_30.jpg\"]', '{\"Talla\":[\"M\",\"L\",\"XL\"],\"Color\":[\"Verde\",\"Negro\"],\"Material\":\"Algodón\"}', 59.99, 'vistas/img/productos/ropa/Vestidos_africanos/vestido_africano_30.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.5, 0, '2025-06-06 18:37:16'),
(31, 1, 2, 'fisico', 'falda-africana-1', 'Falda Africana 1', 'Falda Africana Tradicional', 'Falda africana tradicional con estampados únicos.', '[\"vistas/img/productos/ropa/Falda_africana/falda_africana_1.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Azul\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Falda_africana/falda_africana_1.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.35, 0, '2025-06-06 18:37:16'),
(32, 1, 2, 'fisico', 'falda-africana-2', 'Falda Africana 2', 'Falda Africana Moderna', 'Falda africana con diseño moderno.', '[\"vistas/img/productos/ropa/Falda_africana/falda_africana_2.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Negro\",\"Blanco\"],\"Material\":\"Algodón\"}', 44.99, 'vistas/img/productos/ropa/Falda_africana/falda_africana_2.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.38, 0, '2025-06-06 18:37:16'),
(33, 1, 2, 'fisico', 'falda-africana-3', 'Falda Africana 3', 'Falda Africana Elegante', 'Falda africana con diseño elegante.', '[\"vistas/img/productos/ropa/Falda_africana/falda_africana_3.jpg\"]', '{\"Talla\":[\"M\",\"L\"],\"Color\":[\"Azul\",\"Verde\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Falda_africana/falda_africana_3.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.4, 0, '2025-06-06 18:37:16'),
(34, 1, 2, 'fisico', 'falda-africana-4', 'Falda Africana 4', 'Falda Africana Casual', 'Falda africana para el día a día.', '[\"vistas/img/productos/ropa/Falda_africana/falda_africana_4.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Falda_africana/falda_africana_4.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.35, 0, '2025-06-06 18:37:16'),
(35, 1, 2, 'fisico', 'falda-africana-5', 'Falda Africana 5', 'Falda Africana Festiva', 'Falda africana para ocasiones especiales.', '[\"vistas/img/productos/ropa/Falda_africana/falda_africana_5.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Amarillo\",\"Verde\"],\"Material\":\"Algodón\"}', 54.99, 'vistas/img/productos/ropa/Falda_africana/falda_africana_5.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.42, 0, '2025-06-06 18:37:16'),
(36, 1, 2, 'fisico', 'falda-africana-6', 'Falda Africana 6', 'Falda Africana Verano', 'Falda africana ligera para el verano.', '[\"vistas/img/productos/ropa/Falda_africana/falda_africana_6.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Blanco\",\"Azul\"],\"Material\":\"Algodón\"}', 34.99, 'vistas/img/productos/ropa/Falda_africana/falda_africana_6.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.32, 0, '2025-06-06 18:37:16'),
(37, 1, 2, 'fisico', 'falda-africana-7', 'Falda Africana 7', 'Falda Africana Primavera', 'Falda africana con colores primaverales.', '[\"vistas/img/productos/ropa/Falda_africana/falda_africana_7.jpg\"]', '{\"Talla\":[\"M\",\"L\"],\"Color\":[\"Rosa\",\"Verde\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Falda_africana/falda_africana_7.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.35, 0, '2025-06-06 18:37:16'),
(38, 1, 3, 'fisico', 'camiseta-hombre-1', 'Camiseta Hombre 1', 'Camiseta Africana Tradicional', 'Camiseta africana tradicional para hombre.', '[\"vistas/img/productos/ropa/Camiseta_hombre/camiseta_hombre_9.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Rojo\",\"Azul\"],\"Material\":\"Algodón\"}', 29.99, 'vistas/img/productos/ropa/Camiseta_hombre/camiseta_hombre_9.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:37:16'),
(39, 1, 3, 'fisico', 'camiseta-hombre-2', 'Camiseta Hombre 2', 'Camiseta Africana Moderna', 'Camiseta africana moderna para hombre.', '[\"vistas/img/productos/ropa/Camiseta_hombre/camiseta_hombre_10.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Negro\",\"Blanco\"],\"Material\":\"Algodón\"}', 34.99, 'vistas/img/productos/ropa/Camiseta_hombre/camiseta_hombre_10.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.28, 0, '2025-06-06 18:37:16'),
(42, 1, 4, 'fisico', 'camiseta-mujer-1', 'Camiseta Mujer 1', 'Camiseta Africana Tradicional', 'Camiseta africana tradicional para mujer.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_1.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Azul\"],\"Material\":\"Algodón\"}', 29.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_1.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:37:16'),
(43, 1, 4, 'fisico', 'camiseta-mujer-2', 'Camiseta Mujer 2', 'Camiseta Africana Moderna', 'Camiseta africana moderna para mujer.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_2.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Negro\",\"Blanco\"],\"Material\":\"Algodón\"}', 34.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_2.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.28, 0, '2025-06-06 18:37:16'),
(44, 1, 4, 'fisico', 'camiseta-mujer-3', 'Camiseta Mujer 3', 'Camiseta Africana Elegante', 'Camiseta africana elegante para mujer.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_3.jpg\"]', '{\"Talla\":[\"M\",\"L\"],\"Color\":[\"Azul\",\"Verde\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_3.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.3, 0, '2025-06-06 18:37:16'),
(45, 1, 4, 'fisico', 'camiseta-mujer-4', 'Camiseta Mujer 4', 'Camiseta Africana Casual', 'Camiseta africana casual para mujer.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_4.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\"}', 29.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_4.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:37:16'),
(46, 1, 4, 'fisico', 'camiseta-mujer-5', 'Camiseta Mujer 5', 'Camiseta Africana Festiva', 'Camiseta africana festiva para mujer.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_5.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Amarillo\",\"Verde\"],\"Material\":\"Algodón\"}', 44.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_5.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.32, 0, '2025-06-06 18:37:16'),
(47, 1, 4, 'fisico', 'camiseta-mujer-6', 'Camiseta Mujer 6', 'Camiseta Africana Verano', 'Camiseta africana para el verano.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_6.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Blanco\",\"Azul\"],\"Material\":\"Algodón\"}', 24.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_6.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.22, 0, '2025-06-06 18:37:16'),
(48, 1, 4, 'fisico', 'camiseta-mujer-7', 'Camiseta Mujer 7', 'Camiseta Africana Primavera', 'Camiseta africana para la primavera.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_7.jpg\"]', '{\"Talla\":[\"M\",\"L\"],\"Color\":[\"Rosa\",\"Verde\"],\"Material\":\"Algodón\"}', 29.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_7.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:37:16'),
(49, 1, 4, 'fisico', 'camiseta-mujer-8', 'Camiseta Mujer 8', 'Camiseta Africana Otoño', 'Camiseta africana para el otoño.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_8.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Marrón\",\"Naranja\"],\"Material\":\"Algodón\"}', 34.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_8.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.28, 0, '2025-06-06 18:37:16'),
(50, 1, 4, 'fisico', 'camiseta-mujer-9', 'Camiseta Mujer 9', 'Camiseta Africana Invierno', 'Camiseta africana para el invierno.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_9.jpg\"]', '{\"Talla\":[\"M\",\"L\"],\"Color\":[\"Negro\",\"Gris\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_9.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.3, 0, '2025-06-06 18:37:16'),
(51, 1, 4, 'fisico', 'camiseta-mujer-10', 'Camiseta Mujer 10', 'Camiseta Africana Clásica', 'Camiseta africana clásica para mujer.', '[\"vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_10.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\"}', 29.99, 'vistas/img/productos/ropa/Camiseta_mujer/camiseta_mujer_10.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:37:16'),
(52, 1, 5, 'fisico', 'camisa-hombre-1', 'Camisa Hombre 1', 'Camisa Africana Tradicional', 'Camisa africana tradicional para hombre.', '[\"vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_1.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Rojo\",\"Azul\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_1.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.3, 0, '2025-06-06 18:37:48'),
(53, 1, 5, 'fisico', 'camisa-hombre-2', 'Camisa Hombre 2', 'Camisa Africana Moderna', 'Camisa africana moderna para hombre.', '[\"vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_2.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Negro\",\"Blanco\"],\"Material\":\"Algodón\"}', 44.99, 'vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_2.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.32, 0, '2025-06-06 18:37:48'),
(54, 1, 5, 'fisico', 'camisa-hombre-3', 'Camisa Hombre 3', 'Camisa Africana Elegante', 'Camisa africana elegante para hombre.', '[\"vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_3.jpg\"]', '{\"Talla\":[\"M\",\"L\"],\"Color\":[\"Azul\",\"Verde\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_3.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.35, 0, '2025-06-06 18:37:48'),
(55, 1, 5, 'fisico', 'camisa-hombre-4', 'Camisa Hombre 4', 'Camisa Africana Casual', 'Camisa africana casual para hombre.', '[\"vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_4.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_4.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.3, 0, '2025-06-06 18:37:48'),
(56, 1, 5, 'fisico', 'camisa-hombre-5', 'Camisa Hombre 5', 'Camisa Africana Festiva', 'Camisa africana festiva para hombre.', '[\"vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_5.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Amarillo\",\"Verde\"],\"Material\":\"Algodón\"}', 54.99, 'vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_5.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.38, 0, '2025-06-06 18:37:48'),
(57, 1, 5, 'fisico', 'camisa-hombre-6', 'Camisa Hombre 6', 'Camisa Africana Verano', 'Camisa africana para el verano.', '[\"vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_6.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Blanco\",\"Azul\"],\"Material\":\"Algodón\"}', 34.99, 'vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_6.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.28, 0, '2025-06-06 18:37:48'),
(58, 1, 5, 'fisico', 'camisa-hombre-7', 'Camisa Hombre 7', 'Camisa Africana Primavera', 'Camisa africana para la primavera.', '[\"vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_7.jpg\"]', '{\"Talla\":[\"M\",\"L\"],\"Color\":[\"Rosa\",\"Verde\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_7.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.3, 0, '2025-06-06 18:37:48'),
(59, 1, 5, 'fisico', 'camisa-hombre-8', 'Camisa Hombre 8', 'Camisa Africana Otoño', 'Camisa africana para el otoño.', '[\"vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_8.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Marrón\",\"Naranja\"],\"Material\":\"Algodón\"}', 44.99, 'vistas/img/productos/ropa/Camisas_hombre/camisa_hombre_8.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.32, 0, '2025-06-06 18:37:48'),
(60, 1, 6, 'fisico', 'bermuda-hombre-1', 'Bermuda Hombre 1', 'Bermuda Africana Tradicional', 'Bermuda africana tradicional para hombre.', '[\"vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_1.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\",\"XL\"],\"Color\":[\"Rojo\",\"Azul\"],\"Material\":\"Algodón\"}', 34.99, 'vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_1.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:38:34'),
(61, 1, 6, 'fisico', 'bermuda-hombre-2', 'Bermuda Hombre 2', 'Bermuda Africana Moderna', 'Bermuda africana moderna para hombre.', '[\"vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_2.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Negro\",\"Blanco\"],\"Material\":\"Algodón\"}', 39.99, 'vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_2.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.28, 0, '2025-06-06 18:38:34'),
(62, 1, 6, 'fisico', 'bermuda-hombre-3', 'Bermuda Hombre 3', 'Bermuda Africana Elegante', 'Bermuda africana elegante para hombre.', '[\"vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_3.jpg\"]', '{\"Talla\":[\"M\",\"L\"],\"Color\":[\"Azul\",\"Verde\"],\"Material\":\"Algodón\"}', 44.99, 'vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_3.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.3, 0, '2025-06-06 18:38:34'),
(63, 1, 6, 'fisico', 'bermuda-hombre-4', 'Bermuda Hombre 4', 'Bermuda Africana Casual', 'Bermuda africana casual para hombre.', '[\"vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_4.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\"}', 34.99, 'vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_4.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:38:34'),
(64, 1, 6, 'fisico', 'bermuda-hombre-5', 'Bermuda Hombre 5', 'Bermuda Africana Festiva', 'Bermuda africana festiva para hombre.', '[\"vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_5.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Amarillo\",\"Verde\"],\"Material\":\"Algodón\"}', 49.99, 'vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_5.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.32, 0, '2025-06-06 18:38:34'),
(65, 1, 6, 'fisico', 'bermuda-hombre-6', 'Bermuda Hombre 6', 'Bermuda Africana Verano', 'Bermuda africana para el verano.', '[\"vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_6.jpg\"]', '{\"Talla\":[\"S\",\"M\",\"L\"],\"Color\":[\"Blanco\",\"Azul\"],\"Material\":\"Algodón\"}', 29.99, 'vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_6.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.22, 0, '2025-06-06 18:38:34'),
(66, 1, 6, 'fisico', 'bermuda-hombre-7', 'Bermuda Hombre 7', 'Bermuda Africana Primavera', 'Bermuda africana para la primavera.', '[\"vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_7.jpg\"]', '{\"Talla\":[\"M\",\"L\"],\"Color\":[\"Rosa\",\"Verde\"],\"Material\":\"Algodón\"}', 34.99, 'vistas/img/productos/ropa/Bermudas_hombre/bermuda_hombre_7.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:38:34'),
(70, 1, 7, 'fisico', 'tela-africana-1', 'Tela Africana 1', 'Tela Africana Tradicional', 'Tela africana tradicional con diseños únicos.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_1.jpg\"]', '{\"Color\":[\"Rojo\",\"Azul\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 24.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_1.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.2, 0, '2025-06-06 18:38:50'),
(71, 1, 7, 'fisico', 'tela-africana-2', 'Tela Africana 2', 'Tela Africana Moderna', 'Tela africana moderna con estampados contemporáneos.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_2.jpg\"]', '{\"Color\":[\"Negro\",\"Blanco\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 29.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_2.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.22, 0, '2025-06-06 18:38:50'),
(72, 1, 7, 'fisico', 'tela-africana-3', 'Tela Africana 3', 'Tela Africana Elegante', 'Tela africana elegante para ocasiones especiales.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_3.jpg\"]', '{\"Color\":[\"Azul\",\"Verde\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 34.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_3.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:38:50'),
(73, 1, 7, 'fisico', 'tela-africana-4', 'Tela Africana 4', 'Tela Africana Casual', 'Tela africana casual para uso diario.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_4.jpg\"]', '{\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 24.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_4.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.2, 0, '2025-06-06 18:38:50'),
(74, 1, 7, 'fisico', 'tela-africana-5', 'Tela Africana 5', 'Tela Africana Festiva', 'Tela africana festiva para celebraciones.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_5.jpg\"]', '{\"Color\":[\"Amarillo\",\"Verde\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 39.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_5.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.28, 0, '2025-06-06 18:38:50'),
(75, 1, 7, 'fisico', 'tela-africana-6', 'Tela Africana 6', 'Tela Africana Verano', 'Tela africana ligera para el verano.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_6.jpg\"]', '{\"Color\":[\"Blanco\",\"Azul\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 19.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_6.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.18, 0, '2025-06-06 18:38:50'),
(76, 1, 7, 'fisico', 'tela-africana-7', 'Tela Africana 7', 'Tela Africana Primavera', 'Tela africana para la primavera.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_7.jpg\"]', '{\"Color\":[\"Rosa\",\"Verde\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 24.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_7.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.2, 0, '2025-06-06 18:38:50'),
(77, 1, 7, 'fisico', 'tela-africana-8', 'Tela Africana 8', 'Tela Africana Otoño', 'Tela africana para el otoño.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_8.jpg\"]', '{\"Color\":[\"Marrón\",\"Naranja\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 29.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_8.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.22, 0, '2025-06-06 18:38:50'),
(78, 1, 7, 'fisico', 'tela-africana-9', 'Tela Africana 9', 'Tela Africana Invierno', 'Tela africana para el invierno.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_9.jpg\"]', '{\"Color\":[\"Negro\",\"Gris\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 34.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_9.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.25, 0, '2025-06-06 18:38:50'),
(79, 1, 7, 'fisico', 'tela-africana-10', 'Tela Africana 10', 'Tela Africana Clásica', 'Tela africana clásica con diseños tradicionales.', '[\"vistas/img/productos/ropa/tela_africana/tela_africana_10.jpg\"]', '{\"Color\":[\"Rojo\",\"Negro\"],\"Material\":\"Algodón\",\"Ancho\":\"1.5m\"}', 24.99, 'vistas/img/productos/ropa/tela_africana/tela_africana_10.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.2, 0, '2025-06-06 18:38:50'),
(80, 2, 8, 'fisico', 'calzado-africano-1', 'Calzado Africano 1', 'Sandalias Africanas Tradicionales', 'Sandalias africanas tradicionales con diseños únicos.', '[\"vistas/img/productos/calzado-africano/calzado01.jpg\"]', '{\"Talla\":[\"36\",\"37\",\"38\",\"39\",\"40\"],\"Color\":[\"Marrón\",\"Negro\"],\"Material\":\"Cuero\"}', 49.99, 'vistas/img/productos/calzado-africano/calzado01.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.5, 0, '2025-06-06 19:17:45'),
(81, 2, 8, 'fisico', 'calzado-africano-2', 'Calzado Africano 2', 'Mocasines Africanos Modernos', 'Mocasines africanos modernos con estampados contemporáneos.', '[\"vistas/img/productos/calzado-africano/calzado02.jpg\"]', '{\"Talla\":[\"37\",\"38\",\"39\",\"40\",\"41\"],\"Color\":[\"Negro\",\"Azul\"],\"Material\":\"Cuero\"}', 59.99, 'vistas/img/productos/calzado-africano/calzado02.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.55, 0, '2025-06-06 19:18:08'),
(82, 2, 8, 'fisico', 'calzado-africano-3', 'Calzado Africano 3', 'Zapatillas Africanas Elegantes', 'Zapatillas africanas elegantes para ocasiones especiales.', '[\"vistas/img/productos/calzado-africano/calzado03.jpg\"]', '{\"Talla\":[\"38\",\"39\",\"40\",\"41\",\"42\"],\"Color\":[\"Rojo\",\"Verde\"],\"Material\":\"Cuero\"}', 69.99, 'vistas/img/productos/calzado-africano/calzado03.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.6, 0, '2025-06-06 19:18:18'),
(83, 2, 8, 'fisico', 'calzado-africano-4', 'Calzado Africano 4', 'Zapatos Africanos Casuales', 'Zapatos africanos casuales para uso diario.', '[\"vistas/img/productos/calzado-africano/calzado04.jpg\"]', '{\"Talla\":[\"36\",\"37\",\"38\",\"39\",\"40\"],\"Color\":[\"Marrón\",\"Negro\"],\"Material\":\"Cuero\"}', 54.99, 'vistas/img/productos/calzado-africano/calzado04.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.52, 0, '2025-06-06 19:18:43'),
(84, 2, 8, 'fisico', 'calzado-africano-5', 'Calzado Africano 5', 'Botas Africanas Festivas', 'Botas africanas festivas para celebraciones.', '[\"vistas/img/productos/calzado-africano/calzado05.jpg\"]', '{\"Talla\":[\"37\",\"38\",\"39\",\"40\",\"41\"],\"Color\":[\"Amarillo\",\"Verde\"],\"Material\":\"Cuero\"}', 79.99, 'vistas/img/productos/calzado-africano/calzado05.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.65, 0, '2025-06-06 19:19:08'),
(85, 2, 8, 'fisico', 'calzado-africano-6', 'Calzado Africano 6', 'Sandalias Africanas Verano', 'Sandalias africanas ligeras para el verano.', '[\"vistas/img/productos/calzado-africano/calzado06.jpg\"]', '{\"Talla\":[\"36\",\"37\",\"38\",\"39\",\"40\"],\"Color\":[\"Blanco\",\"Azul\"],\"Material\":\"Cuero\"}', 44.99, 'vistas/img/productos/calzado-africano/calzado06.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 0.45, 0, '2025-06-06 19:19:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `imgFondo` text NOT NULL,
  `tipoSlide` text NOT NULL,
  `imgProducto` text NOT NULL,
  `estiloImgProducto` text NOT NULL,
  `estiloTextoSlide` text NOT NULL,
  `titulo1` text NOT NULL,
  `titulo2` text NOT NULL,
  `titulo3` text NOT NULL,
  `boton` text NOT NULL,
  `url` text NOT NULL,
  `orden` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `nombre`, `imgFondo`, `tipoSlide`, `imgProducto`, `estiloImgProducto`, `estiloTextoSlide`, `titulo1`, `titulo2`, `titulo3`, `boton`, `url`, `orden`, `fecha`) VALUES
(1, 'COLLAR AMARILLO', 'vistas/img/slide/slide1/collaramarillo.png', 'slideOpcion2', '', '{\"top\":\"5\",\"right\":\"\",\"left\":\"5\",\"width\":\"50\"}', '{\"top\":\"40\",\"right\":\"10\",\"left\":\"\",\"width\":\"40\"}\r\n\r\n', '{\"texto\":\"Ropa Africana\",\"color\":\"#333\"}', '{\"texto\":\"Yere Jeekk Ropa Africana en Murcia\",\"color\":\"#777\"}', '{\"texto\":\"Yere Jeekk Ropa Africana en Murcia\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 6, '2025-06-09 09:14:08'),
(2, 'MODA AFRICA', 'vistas/img/slide/slide2/cabecera4.jpg', 'slideOpcion1', '', '{\"top\":\"10\",\"right\":\"14.999268376908805\",\"left\":\"\",\"width\":\"30\"}', '{\"top\":\"15\",\"right\":\"\",\"left\":\"8\",\"width\":\"40\"}\r\n', '{\"texto\":\"Ropa con encanto, para gente encantadora\",\"color\":\"#333\"}', '{\"texto\":\"La moda africana es Tendencia\",\"color\":\"#777\"}', '{\"texto\":\"Viste color, viste cultura, viste Yere Jeëkk.\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 1, '2025-06-09 09:07:43'),
(3, 'VESTIDO AFRICANO CORTO', 'vistas/img/slide/slide3/cabecera6.jpg\r\n', 'slideOpcion2', '', '{\"top\":\"10\",\"right\":\"\",\"left\":\"10\",\"width\":\"35\"}', '{\"top\":\"30\",\"right\":\"10\",\"left\":\"\",\"width\":\"40\"}', '{\"texto\":\"Estilo étnico que celebra la diversidad.\",\"color\":\"#000\"}', '{\"texto\":\"Hecho a mano, pensado para brillar.\",\"color\":\"#000\"}', '{\"texto\":\"Estilo étnico que celebra la diversidad.\",\"color\":\"#000\"}', 'VER PRODUCTO', '#', 2, '2025-06-09 01:30:47'),
(4, 'CHICA GABARDINA', 'vistas/img/slide/slide4/banner4.jpg', 'slideOpcion1', '', '{\"top\":\"10\",\"right\":\"\",\"left\":\"10\",\"width\":\"35\"}', '{\"top\":\"20\",\"right\":\"10\",\"left\":\"\",\"width\":\"40\"}', '{\"texto\":\"Ropa con historia, hecha con alma.\",\"color\":\"#333\"}', '{\"texto\":\"Colores que cuentan historias.\",\"color\":\"#777\"}', '{\"texto\":\"Tejidos que hablan de África y de ti.\",\"color\":\"#888\"}', '', '', 7, '2025-06-09 01:36:41'),
(5, '', 'vistas/img/slide/default/cabecera2.jpg', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"20\",\"right\":\"\",\"left\":\"15\",\"width\":\"40\"}', '{\"texto\":\"Ropa Africana\",\"color\":\"#000\"}\r\n\r\n', '{\"texto\":\"Tejidos tradicionales, estilo actual.\",\"color\":\"#444\"}\r\n', '{\"texto\":\"Estilo único, origen africano.\",\"color\":\"#777\"}\r\n', 'VER PRODUCTO', '#', 4, '2025-06-11 20:13:38'),
(6, '', 'vistas/img/slide/default/cabecera8.jpg', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"10\",\"right\":\"10\",\"left\":\"15\",\"width\":\"30\"}', '{\"texto\":\"Moda con valores: \",\"color\":\"#333\"}', '{\"texto\":\"tradición, sostenibilidad, \",\"color\":\"#777\"}', '{\"texto\":\"color.\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 5, '2025-06-11 20:13:39'),
(7, 'bikini', 'vistas/img/slide/slide29/banner1.jpg', 'slideOpcion2', '', '{\"top\":\"10\",\"right\":\"\",\"left\":\"10\",\"width\":\"20\"}', '{\"top\":\"10\",\"right\":\"15\",\"left\":\"\",\"width\":\"40\"}', '{\"texto\":\"Moda baño a todo color\",\"color\":\"#b23d3d\"}', '{\"texto\":\"Colores vivos, confección lenta, impacto duradero.\",\"color\":\"#777\"}', '{\"texto\":\"Diseñado por María Acosta, inspirado en África.\",\"color\":\"#888\"}', 'VER PRODUCTO', '', 8, '2025-06-11 20:13:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` text NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `ofertadoPorCategoria` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text NOT NULL,
  `finOferta` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `id_categoria`, `ruta`, `ofertadoPorCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `fecha`) VALUES
(1, 'Vestidos Africanos', 1, 'vestidos-africanos', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2025-06-06 16:19:24'),
(2, 'Faldas Africanas', 1, 'faldas-africanas', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2025-06-06 16:19:24'),
(3, 'Camisetas Hombre', 1, 'camisetas-hombre', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2025-06-06 16:19:24'),
(4, 'Camisetas Mujer', 1, 'camisetas-mujer', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2025-06-06 16:19:24'),
(5, 'Camisas Hombre', 1, 'camisas-hombre', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2025-06-06 16:19:24'),
(6, 'Bermudas Hombre', 1, 'bermudas-hombre', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2025-06-06 16:19:24'),
(7, 'Telas Africanas', 1, 'telas-africanas', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2025-06-06 16:19:24'),
(8, 'Calzado Africano', 2, 'calzado-africano', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2025-06-06 19:11:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `modo` text NOT NULL,
  `foto` text NOT NULL,
  `verificacion` int(11) NOT NULL,
  `emailEncriptado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `email`, `modo`, `foto`, `verificacion`, `emailEncriptado`, `fecha`) VALUES
(1, 'Maria acosta Ayala', '$2a$07$asxx54ahjppf45sd87a5auu5EesHDDqzbZIbxA4PPk.ysOipxgR6W', 'macosta27@gmail.com', 'directo', '', 0, '3df8555d55b2574ae068e43278097a0b', '2025-06-05 18:09:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitaspaises`
--

CREATE TABLE `visitaspaises` (
  `id` int(11) NOT NULL,
  `pais` text NOT NULL,
  `codigo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visitaspaises`
--

INSERT INTO `visitaspaises` (`id`, `pais`, `codigo`, `cantidad`, `fecha`) VALUES
(1, 'Japan', '', 73, '2025-06-30 21:32:35'),
(2, 'Russia', '', 41, '2025-06-13 13:10:54'),
(3, 'United States', '', 40, '2025-06-28 19:14:34'),
(4, 'United Kingdom', '', 38, '2025-06-13 10:17:51'),
(5, 'Spain', '', 37, '2025-06-28 18:16:19'),
(6, 'Colombia', '', 36, '2025-06-28 18:16:03'),
(7, 'Brazil', '', 36, '2025-06-13 04:27:35'),
(8, 'China', '', 35, '2025-06-28 18:15:57'),
(9, 'Mexico', '', 35, '2025-06-13 15:03:31'),
(10, 'Italy', '', 34, '2025-06-13 10:13:59'),
(11, 'France', '', 33, '2025-06-12 18:57:44'),
(12, 'Australia', '', 32, '2025-06-13 11:45:16'),
(13, 'Germany', '', 29, '2025-06-28 18:13:45'),
(14, 'India', '', 29, '2025-06-11 09:47:57'),
(15, 'Canada', '', 25, '2025-06-13 00:55:44'),
(16, 'Unknown', '', 2, '2025-06-30 14:41:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitaspersonas`
--

CREATE TABLE `visitaspersonas` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `pais` text NOT NULL,
  `visitas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visitaspersonas`
--

INSERT INTO `visitaspersonas` (`id`, `ip`, `pais`, `visitas`, `fecha`) VALUES
(1, '153.205.198.22', 'Japan', 1, '2025-05-31 22:01:27'),
(2, '12.63.22.177', 'Italy', 1, '2025-05-31 22:15:43'),
(3, '121.85.64.63', 'Canada', 1, '2025-06-01 01:44:13'),
(4, '88.176.103.243', 'Italy', 1, '2025-06-01 02:11:05'),
(5, '210.15.215.6', 'France', 1, '2025-06-01 02:25:47'),
(6, '84.155.11.104', 'France', 1, '2025-06-01 03:14:20'),
(7, '197.205.179.27', 'Germany', 1, '2025-06-01 03:18:27'),
(8, '171.77.129.155', 'Australia', 1, '2025-06-01 03:32:39'),
(9, '119.67.234.204', 'Russia', 1, '2025-06-01 04:51:22'),
(10, '37.170.227.112', 'China', 1, '2025-06-01 04:51:38'),
(11, '90.177.102.235', 'Spain', 1, '2025-06-01 05:26:14'),
(12, '0.237.163.105', 'Canada', 1, '2025-06-01 05:32:57'),
(13, '10.32.129.40', 'Mexico', 1, '2025-06-01 05:41:30'),
(14, '217.39.59.176', 'Russia', 1, '2025-06-01 07:29:32'),
(15, '117.49.149.89', 'Germany', 1, '2025-06-01 07:45:29'),
(16, '211.9.180.104', 'Mexico', 1, '2025-06-01 07:47:39'),
(17, '222.63.163.111', 'United Kingdom', 1, '2025-06-01 08:15:41'),
(18, '94.192.167.2', 'United States', 1, '2025-06-01 08:15:56'),
(19, '2.243.187.205', 'India', 1, '2025-06-01 08:23:27'),
(20, '11.27.101.172', 'China', 1, '2025-06-01 09:14:21'),
(21, '50.221.189.24', 'Russia', 1, '2025-06-01 10:05:28'),
(22, '158.250.6.50', 'Spain', 1, '2025-06-01 10:25:45'),
(23, '3.241.174.145', 'Spain', 1, '2025-06-01 10:28:15'),
(24, '48.206.120.239', 'Colombia', 1, '2025-06-01 11:43:30'),
(25, '17.51.207.114', 'India', 1, '2025-06-01 11:52:27'),
(26, '115.33.73.10', 'Spain', 1, '2025-06-01 11:54:00'),
(27, '219.37.42.100', 'Japan', 1, '2025-06-01 12:29:43'),
(28, '118.45.126.240', 'Mexico', 1, '2025-06-01 12:44:02'),
(29, '249.181.159.252', 'Mexico', 1, '2025-06-01 14:01:07'),
(30, '192.147.161.108', 'India', 1, '2025-06-01 16:34:16'),
(31, '18.46.175.225', 'Japan', 1, '2025-06-01 16:53:40'),
(32, '65.23.178.54', 'Spain', 1, '2025-06-01 17:13:48'),
(33, '192.146.152.70', 'Brazil', 1, '2025-06-01 17:23:58'),
(34, '153.205.198.22', 'Japan', 1, '2025-06-01 18:14:18'),
(35, '20.50.192.41', 'Russia', 1, '2025-06-01 18:16:12'),
(36, '157.225.142.34', 'United States', 1, '2025-06-01 18:24:15'),
(37, '135.111.152.173', 'France', 1, '2025-06-01 18:34:54'),
(38, '100.194.156.200', 'Japan', 1, '2025-06-01 19:08:16'),
(39, '84.113.58.207', 'Germany', 1, '2025-06-01 19:25:05'),
(40, '19.41.150.114', 'Japan', 1, '2025-06-01 20:00:19'),
(41, '15.21.61.240', 'China', 1, '2025-06-01 20:52:39'),
(42, '74.56.61.138', 'Colombia', 1, '2025-06-01 21:15:59'),
(43, '252.179.141.168', 'Colombia', 1, '2025-06-01 21:32:54'),
(44, '64.6.94.197', 'China', 1, '2025-06-01 22:04:19'),
(45, '217.4.139.168', 'China', 1, '2025-06-01 22:06:31'),
(46, '70.32.207.170', 'Brazil', 1, '2025-06-01 23:00:48'),
(47, '86.114.57.198', 'Brazil', 1, '2025-06-01 23:24:08'),
(48, '157.207.52.153', 'Japan', 1, '2025-06-02 01:19:40'),
(49, '142.128.218.195', 'Japan', 1, '2025-06-02 01:27:16'),
(50, '88.119.74.15', 'United Kingdom', 1, '2025-06-02 01:29:28'),
(51, '4.204.238.69', 'Australia', 1, '2025-06-02 03:43:51'),
(52, '202.171.247.212', 'France', 1, '2025-06-02 03:48:37'),
(53, '20.28.80.62', 'India', 1, '2025-06-02 03:49:51'),
(54, '133.77.242.212', 'Canada', 1, '2025-06-02 05:40:31'),
(55, '24.39.126.255', 'United Kingdom', 1, '2025-06-02 06:29:28'),
(56, '138.96.65.40', 'United States', 1, '2025-06-02 07:18:01'),
(57, '67.251.33.178', 'United States', 1, '2025-06-02 07:20:26'),
(58, '135.79.246.228', 'Italy', 1, '2025-06-02 07:51:53'),
(59, '82.68.95.16', 'Italy', 1, '2025-06-02 09:45:09'),
(60, '69.255.44.223', 'Brazil', 1, '2025-06-02 10:20:35'),
(61, '108.195.139.109', 'Italy', 1, '2025-06-02 11:04:25'),
(62, '254.152.2.66', 'Mexico', 1, '2025-06-02 11:09:06'),
(63, '24.26.60.221', 'India', 1, '2025-06-02 11:45:33'),
(64, '63.220.146.69', 'Brazil', 1, '2025-06-02 12:01:02'),
(65, '249.129.152.116', 'China', 1, '2025-06-02 12:11:44'),
(66, '21.11.249.188', 'Canada', 1, '2025-06-02 12:25:13'),
(67, '165.219.85.25', 'Canada', 1, '2025-06-02 13:16:58'),
(68, '95.121.64.216', 'Canada', 1, '2025-06-02 13:31:48'),
(69, '146.118.153.157', 'Brazil', 1, '2025-06-02 13:56:47'),
(70, '152.151.43.20', 'France', 1, '2025-06-02 14:06:29'),
(71, '153.205.198.22', 'Japan', 1, '2025-06-02 14:46:52'),
(72, '205.154.154.53', 'Spain', 1, '2025-06-02 15:28:01'),
(73, '237.59.98.57', 'Germany', 1, '2025-06-02 15:32:41'),
(74, '112.200.153.164', 'Russia', 1, '2025-06-02 16:30:00'),
(75, '151.139.240.17', 'Australia', 1, '2025-06-02 16:37:36'),
(76, '46.125.230.9', 'Mexico', 1, '2025-06-02 17:21:03'),
(77, '81.41.217.195', 'Colombia', 1, '2025-06-02 18:06:42'),
(78, '222.230.231.209', 'Spain', 1, '2025-06-02 18:21:01'),
(79, '26.21.29.82', 'Mexico', 1, '2025-06-02 18:26:16'),
(80, '199.115.236.67', 'Canada', 1, '2025-06-02 18:36:03'),
(81, '134.46.87.41', 'Germany', 1, '2025-06-02 18:49:04'),
(82, '114.198.136.87', 'Mexico', 1, '2025-06-02 20:31:07'),
(83, '1.146.214.120', 'Canada', 1, '2025-06-02 20:52:50'),
(84, '162.181.165.27', 'India', 1, '2025-06-02 21:13:53'),
(85, '246.88.215.45', 'Spain', 1, '2025-06-02 22:05:25'),
(86, '46.110.157.198', 'United States', 1, '2025-06-02 22:27:14'),
(87, '61.184.223.55', 'China', 1, '2025-06-02 23:05:45'),
(88, '105.139.123.202', 'Colombia', 1, '2025-06-03 01:57:46'),
(89, '86.45.224.218', 'Spain', 1, '2025-06-03 02:08:08'),
(90, '245.73.141.230', 'Australia', 1, '2025-06-03 02:40:34'),
(91, '119.208.171.234', 'Japan', 1, '2025-06-03 02:59:13'),
(92, '120.210.180.15', 'Spain', 1, '2025-06-03 03:44:52'),
(93, '76.247.240.204', 'United Kingdom', 1, '2025-06-03 03:54:51'),
(94, '186.28.93.128', 'Canada', 1, '2025-06-03 04:19:23'),
(95, '214.163.172.117', 'Russia', 1, '2025-06-03 05:39:54'),
(96, '219.188.27.82', 'China', 1, '2025-06-03 05:52:56'),
(97, '2.128.122.226', 'Canada', 1, '2025-06-03 06:24:17'),
(98, '192.49.184.4', 'Germany', 1, '2025-06-03 06:50:25'),
(99, '58.148.55.86', 'United States', 1, '2025-06-03 07:48:16'),
(100, '154.115.115.229', 'Italy', 1, '2025-06-03 07:52:47'),
(101, '228.229.203.72', 'United States', 1, '2025-06-03 08:23:30'),
(102, '128.238.40.252', 'India', 1, '2025-06-03 09:18:00'),
(103, '179.233.117.144', 'India', 1, '2025-06-03 10:06:24'),
(104, '59.144.34.251', 'United Kingdom', 1, '2025-06-03 10:13:07'),
(105, '122.205.149.131', 'India', 1, '2025-06-03 10:16:57'),
(106, '142.46.58.155', 'Italy', 1, '2025-06-03 11:35:03'),
(107, '165.161.55.49', 'Spain', 1, '2025-06-03 11:38:31'),
(108, '187.16.29.97', 'United Kingdom', 1, '2025-06-03 11:47:03'),
(109, '209.123.245.89', 'Germany', 1, '2025-06-03 12:40:03'),
(110, '153.205.198.22', 'Japan', 1, '2025-06-03 12:54:29'),
(111, '108.124.39.83', 'United States', 1, '2025-06-03 13:46:45'),
(112, '244.34.209.174', 'Italy', 1, '2025-06-03 14:20:12'),
(113, '250.66.94.14', 'Mexico', 1, '2025-06-03 14:55:49'),
(114, '68.178.175.84', 'Russia', 1, '2025-06-03 15:05:06'),
(115, '21.199.165.227', 'Germany', 1, '2025-06-03 15:08:02'),
(116, '240.12.107.243', 'Brazil', 1, '2025-06-03 16:06:06'),
(117, '22.200.168.239', 'Russia', 1, '2025-06-03 16:09:36'),
(118, '183.236.118.141', 'Japan', 1, '2025-06-03 16:43:35'),
(119, '58.125.194.84', 'United Kingdom', 1, '2025-06-03 16:57:45'),
(120, '201.66.238.225', 'Germany', 1, '2025-06-03 18:40:36'),
(121, '234.232.201.53', 'United Kingdom', 1, '2025-06-03 19:12:26'),
(122, '32.245.103.37', 'China', 1, '2025-06-03 19:20:11'),
(123, '78.220.97.80', 'Brazil', 1, '2025-06-03 19:21:10'),
(124, '65.151.50.52', 'France', 1, '2025-06-03 19:31:46'),
(125, '107.105.206.205', 'Germany', 1, '2025-06-03 20:05:42'),
(126, '67.159.81.184', 'Mexico', 1, '2025-06-03 21:31:30'),
(127, '241.0.47.235', 'Spain', 1, '2025-06-03 22:06:08'),
(128, '214.121.220.224', 'France', 1, '2025-06-03 23:19:22'),
(129, '208.89.78.122', 'Italy', 1, '2025-06-03 23:55:41'),
(130, '200.48.150.97', 'United States', 1, '2025-06-04 00:01:54'),
(131, '199.41.122.230', 'United Kingdom', 1, '2025-06-04 00:12:41'),
(132, '247.28.164.227', 'Spain', 1, '2025-06-04 00:22:00'),
(133, '150.51.61.154', 'Mexico', 1, '2025-06-04 00:29:10'),
(134, '230.193.17.22', 'Germany', 1, '2025-06-04 02:24:05'),
(135, '163.112.73.28', 'France', 1, '2025-06-04 02:33:19'),
(136, '226.172.183.144', 'Italy', 1, '2025-06-04 02:39:57'),
(137, '217.124.227.251', 'Russia', 1, '2025-06-04 03:03:13'),
(138, '228.177.203.229', 'China', 1, '2025-06-04 04:17:05'),
(139, '58.95.44.192', 'United Kingdom', 1, '2025-06-04 04:30:58'),
(140, '23.178.51.236', 'United States', 1, '2025-06-04 04:31:58'),
(141, '14.128.88.55', 'United Kingdom', 1, '2025-06-04 04:43:51'),
(142, '105.68.26.184', 'United Kingdom', 1, '2025-06-04 06:10:24'),
(143, '78.189.200.177', 'Australia', 1, '2025-06-04 06:27:44'),
(144, '174.159.15.109', 'France', 1, '2025-06-04 06:57:13'),
(145, '118.129.37.53', 'Spain', 1, '2025-06-04 07:32:59'),
(146, '194.254.178.129', 'Germany', 1, '2025-06-04 08:07:54'),
(147, '204.45.126.240', 'Russia', 1, '2025-06-04 08:31:05'),
(148, '171.140.184.245', 'France', 1, '2025-06-04 08:38:26'),
(149, '68.134.207.122', 'Brazil', 1, '2025-06-04 09:52:40'),
(150, '128.177.242.170', 'France', 1, '2025-06-04 09:54:36'),
(151, '166.104.25.67', 'United States', 1, '2025-06-04 11:16:08'),
(152, '50.37.33.57', 'Brazil', 1, '2025-06-04 11:54:46'),
(153, '32.204.156.169', 'Colombia', 1, '2025-06-04 11:59:39'),
(154, '174.141.182.231', 'Spain', 1, '2025-06-04 13:41:45'),
(155, '136.206.111.195', 'Japan', 1, '2025-06-04 13:42:31'),
(156, '153.205.198.22', 'Japan', 1, '2025-06-04 13:55:27'),
(157, '25.162.222.111', 'Italy', 1, '2025-06-04 14:22:18'),
(158, '245.232.172.162', 'United States', 1, '2025-06-04 15:19:59'),
(159, '230.157.97.15', 'United States', 1, '2025-06-04 15:39:26'),
(160, '153.205.198.22', 'Japan', 1, '2025-06-04 15:54:03'),
(161, '38.222.229.224', 'Canada', 1, '2025-06-04 16:07:52'),
(162, '73.134.196.67', 'Canada', 1, '2025-06-04 18:21:00'),
(163, '138.202.84.72', 'Spain', 1, '2025-06-04 18:22:36'),
(164, '108.52.192.38', 'India', 1, '2025-06-04 18:23:49'),
(165, '186.186.117.26', 'Germany', 1, '2025-06-04 19:30:43'),
(166, '206.28.31.75', 'Russia', 1, '2025-06-04 20:58:28'),
(167, '168.91.207.251', 'Brazil', 1, '2025-06-04 21:08:54'),
(168, '234.163.113.75', 'Brazil', 1, '2025-06-04 21:54:02'),
(169, '77.147.247.25', 'Colombia', 1, '2025-06-04 22:29:14'),
(170, '150.251.40.212', 'Germany', 1, '2025-06-04 23:25:25'),
(171, '25.132.72.221', 'China', 1, '2025-06-05 01:52:31'),
(172, '234.152.60.97', 'United States', 1, '2025-06-05 02:43:07'),
(173, '94.218.41.64', 'Mexico', 1, '2025-06-05 02:58:00'),
(174, '144.209.102.141', 'Italy', 1, '2025-06-05 03:39:57'),
(175, '32.162.202.10', 'Japan', 1, '2025-06-05 04:47:35'),
(176, '157.14.113.13', 'France', 1, '2025-06-05 05:05:08'),
(177, '54.14.163.4', 'Australia', 1, '2025-06-05 05:26:41'),
(178, '135.159.133.187', 'United Kingdom', 1, '2025-06-05 07:10:28'),
(179, '112.43.137.41', 'China', 1, '2025-06-05 07:11:21'),
(180, '48.231.244.14', 'Australia', 1, '2025-06-05 07:58:02'),
(181, '49.235.4.84', 'Russia', 1, '2025-06-05 08:08:54'),
(182, '12.45.190.48', 'Russia', 1, '2025-06-05 09:56:44'),
(183, '153.205.198.22', 'Japan', 1, '2025-06-05 10:25:32'),
(184, '163.33.188.72', 'Germany', 1, '2025-06-05 10:52:08'),
(185, '176.97.212.2', 'Mexico', 1, '2025-06-05 11:21:40'),
(186, '182.121.62.202', 'United Kingdom', 1, '2025-06-05 11:57:03'),
(187, '193.178.58.9', 'Italy', 1, '2025-06-05 12:10:11'),
(188, '227.90.28.124', 'Spain', 1, '2025-06-05 12:33:44'),
(189, '178.102.232.88', 'United States', 1, '2025-06-05 13:12:33'),
(190, '84.143.204.83', 'Mexico', 1, '2025-06-05 13:39:43'),
(191, '229.97.54.237', 'United States', 1, '2025-06-05 13:39:54'),
(192, '213.17.216.7', 'United Kingdom', 1, '2025-06-05 13:47:27'),
(193, '255.229.122.183', 'Brazil', 1, '2025-06-05 13:50:46'),
(194, '12.34.137.71', 'Australia', 1, '2025-06-05 14:22:09'),
(195, '96.200.202.152', 'India', 1, '2025-06-05 14:36:27'),
(196, '11.28.107.198', 'Germany', 1, '2025-06-05 14:56:39'),
(197, '22.83.96.231', 'France', 1, '2025-06-05 14:57:45'),
(198, '73.83.198.228', 'Russia', 1, '2025-06-05 15:13:00'),
(199, '80.118.92.108', 'United States', 1, '2025-06-05 15:29:40'),
(200, '175.77.117.99', 'Italy', 1, '2025-06-05 16:13:24'),
(201, '153.205.198.22', 'Japan', 1, '2025-06-05 16:17:05'),
(202, '181.108.251.167', 'Brazil', 1, '2025-06-05 16:21:14'),
(203, '250.197.235.72', 'Brazil', 1, '2025-06-05 16:53:34'),
(204, '69.59.88.8', 'United Kingdom', 1, '2025-06-05 16:57:04'),
(205, '14.37.145.104', 'China', 1, '2025-06-05 16:58:15'),
(206, '249.189.198.167', 'Russia', 1, '2025-06-05 17:19:54'),
(207, '192.155.198.17', 'United States', 1, '2025-06-05 18:42:05'),
(208, '99.204.212.189', 'Italy', 1, '2025-06-05 19:14:00'),
(209, '92.167.48.253', 'United Kingdom', 1, '2025-06-05 19:18:38'),
(210, '212.253.120.95', 'Colombia', 1, '2025-06-05 19:20:36'),
(211, '153.205.198.22', 'Japan', 1, '2025-06-05 19:58:04'),
(212, '137.133.1.118', 'Russia', 1, '2025-06-05 20:06:17'),
(213, '103.219.16.191', 'France', 1, '2025-06-05 21:16:42'),
(214, '53.222.183.250', 'China', 1, '2025-06-05 21:19:07'),
(215, '168.28.149.148', 'Italy', 1, '2025-06-05 22:44:25'),
(216, '222.42.53.142', 'India', 1, '2025-06-05 22:56:26'),
(217, '238.121.147.116', 'Germany', 1, '2025-06-05 23:19:06'),
(218, '227.66.160.89', 'Canada', 1, '2025-06-05 23:26:48'),
(219, '8.244.175.145', 'Mexico', 1, '2025-06-06 00:21:53'),
(220, '26.81.69.104', 'Germany', 1, '2025-06-06 01:05:57'),
(221, '205.207.163.196', 'France', 1, '2025-06-06 01:26:37'),
(222, '202.189.81.96', 'Germany', 1, '2025-06-06 01:56:06'),
(223, '61.250.43.234', 'United States', 1, '2025-06-06 02:00:23'),
(224, '10.251.203.8', 'Russia', 1, '2025-06-06 02:02:26'),
(225, '135.109.141.121', 'Australia', 1, '2025-06-06 02:07:46'),
(226, '147.164.125.131', 'United Kingdom', 1, '2025-06-06 03:52:36'),
(227, '116.10.216.24', 'United Kingdom', 1, '2025-06-06 04:03:30'),
(228, '253.175.116.57', 'Colombia', 1, '2025-06-06 06:40:07'),
(229, '62.244.8.79', 'Russia', 1, '2025-06-06 07:22:56'),
(230, '52.190.29.88', 'Spain', 1, '2025-06-06 07:36:56'),
(231, '108.214.237.28', 'Colombia', 1, '2025-06-06 07:52:42'),
(232, '8.228.92.33', 'France', 1, '2025-06-06 07:52:50'),
(233, '135.90.48.226', 'India', 1, '2025-06-06 08:40:36'),
(234, '188.101.196.166', 'Brazil', 1, '2025-06-06 09:32:42'),
(235, '52.187.13.17', 'India', 1, '2025-06-06 09:34:11'),
(236, '238.91.255.235', 'United Kingdom', 1, '2025-06-06 09:56:43'),
(237, '254.169.83.164', 'United States', 1, '2025-06-06 11:07:50'),
(238, '68.5.78.120', 'Australia', 1, '2025-06-06 12:22:31'),
(239, '177.36.162.191', 'France', 1, '2025-06-06 12:32:09'),
(240, '76.45.250.95', 'India', 1, '2025-06-06 12:57:51'),
(241, '57.201.67.244', 'Japan', 1, '2025-06-06 14:05:50'),
(242, '5.194.188.101', 'Brazil', 1, '2025-06-06 14:43:59'),
(243, '76.37.212.185', 'China', 1, '2025-06-06 14:55:00'),
(244, '245.117.104.171', 'Colombia', 1, '2025-06-06 14:57:12'),
(245, '123.16.223.45', 'Italy', 1, '2025-06-06 14:58:32'),
(246, '153.205.198.22', 'Japan', 1, '2025-06-06 15:20:17'),
(247, '83.70.103.48', 'Mexico', 1, '2025-06-06 15:24:20'),
(248, '62.223.160.130', 'Canada', 1, '2025-06-06 16:09:59'),
(249, '27.46.151.104', 'Russia', 1, '2025-06-06 16:27:56'),
(250, '150.149.38.254', 'Italy', 1, '2025-06-06 16:41:00'),
(251, '143.110.122.25', 'Japan', 1, '2025-06-06 16:43:25'),
(252, '150.146.24.196', 'Russia', 1, '2025-06-06 17:24:07'),
(253, '110.197.145.132', 'Germany', 1, '2025-06-06 18:56:14'),
(254, '153.205.198.22', 'Japan', 1, '2025-06-06 20:11:13'),
(255, '45.124.231.13', 'Colombia', 1, '2025-06-06 20:37:51'),
(256, '170.235.154.66', 'Brazil', 1, '2025-06-06 20:57:36'),
(257, '153.152.46.31', 'United States', 1, '2025-06-06 21:18:13'),
(258, '107.175.45.209', 'Spain', 1, '2025-06-06 21:58:07'),
(259, '121.245.95.253', 'United Kingdom', 1, '2025-06-06 21:59:06'),
(260, '45.119.206.158', 'Australia', 1, '2025-06-06 23:00:08'),
(261, '149.126.182.20', 'Brazil', 1, '2025-06-06 23:29:34'),
(262, '61.196.27.63', 'China', 1, '2025-06-07 00:31:05'),
(263, '76.13.94.176', 'Spain', 1, '2025-06-07 01:15:26'),
(264, '189.66.18.151', 'France', 1, '2025-06-07 01:21:05'),
(265, '177.0.234.149', 'Spain', 1, '2025-06-07 03:57:26'),
(266, '103.141.141.24', 'Australia', 1, '2025-06-07 03:59:21'),
(267, '143.84.245.206', 'India', 1, '2025-06-07 04:20:59'),
(268, '251.109.50.180', 'Canada', 1, '2025-06-07 05:22:18'),
(269, '182.19.59.239', 'Australia', 1, '2025-06-07 06:05:07'),
(270, '251.106.33.103', 'Brazil', 1, '2025-06-07 07:11:17'),
(271, '153.205.198.22', 'Japan', 1, '2025-06-07 08:14:06'),
(272, '73.232.177.188', 'Mexico', 1, '2025-06-07 08:33:21'),
(273, '76.250.253.6', 'Mexico', 1, '2025-06-07 08:34:31'),
(274, '98.104.227.53', 'Australia', 1, '2025-06-07 08:45:14'),
(275, '188.38.139.70', 'France', 1, '2025-06-07 09:30:04'),
(276, '213.162.173.123', 'India', 1, '2025-06-07 09:44:05'),
(277, '177.241.163.91', 'Mexico', 1, '2025-06-07 09:49:19'),
(278, '149.96.36.148', 'Colombia', 1, '2025-06-07 10:16:54'),
(279, '137.37.33.52', 'United Kingdom', 1, '2025-06-07 10:18:37'),
(280, '76.241.211.77', 'United States', 1, '2025-06-07 10:57:12'),
(281, '99.100.206.219', 'Colombia', 1, '2025-06-07 11:10:49'),
(282, '213.156.142.241', 'United States', 1, '2025-06-07 12:33:00'),
(283, '60.156.89.236', 'Germany', 1, '2025-06-07 13:20:28'),
(284, '106.127.62.183', 'Japan', 1, '2025-06-07 14:46:12'),
(285, '84.18.93.157', 'Australia', 1, '2025-06-07 14:47:33'),
(286, '194.55.207.102', 'Mexico', 1, '2025-06-07 15:15:50'),
(287, '202.96.129.102', 'Russia', 1, '2025-06-07 15:29:18'),
(288, '137.23.219.0', 'France', 1, '2025-06-07 15:48:31'),
(289, '209.125.254.130', 'Colombia', 1, '2025-06-07 16:37:59'),
(290, '117.180.36.153', 'Germany', 1, '2025-06-07 16:42:15'),
(291, '86.23.115.250', 'Australia', 1, '2025-06-07 16:53:01'),
(292, '210.132.29.4', 'Spain', 1, '2025-06-07 17:07:49'),
(293, '91.48.221.196', 'Russia', 1, '2025-06-07 17:36:48'),
(294, '186.1.215.50', 'United Kingdom', 1, '2025-06-07 20:07:35'),
(295, '104.106.217.0', 'India', 1, '2025-06-07 20:21:26'),
(296, '240.16.127.75', 'Japan', 1, '2025-06-07 20:39:05'),
(297, '31.247.121.119', 'Spain', 1, '2025-06-07 21:00:30'),
(298, '153.205.198.22', 'Japan', 1, '2025-06-07 21:32:13'),
(299, '58.128.210.153', 'United Kingdom', 1, '2025-06-07 21:33:25'),
(300, '20.191.129.70', 'Italy', 1, '2025-06-07 22:12:08'),
(301, '122.187.60.251', 'Colombia', 1, '2025-06-07 22:25:34'),
(302, '161.130.164.178', 'Brazil', 1, '2025-06-07 22:33:30'),
(303, '39.26.14.247', 'China', 1, '2025-06-07 23:43:18'),
(304, '228.203.76.25', 'China', 1, '2025-06-08 00:38:43'),
(305, '243.18.133.96', 'China', 1, '2025-06-08 00:50:30'),
(306, '110.123.30.36', 'India', 1, '2025-06-08 01:28:13'),
(307, '195.30.81.56', 'Mexico', 1, '2025-06-08 01:57:21'),
(308, '154.82.202.255', 'Japan', 1, '2025-06-08 03:27:40'),
(309, '4.96.212.6', 'Brazil', 1, '2025-06-08 04:03:20'),
(310, '164.125.133.35', 'United States', 1, '2025-06-08 04:39:40'),
(311, '228.191.14.10', 'United States', 1, '2025-06-08 04:52:16'),
(312, '170.151.244.1', 'Canada', 1, '2025-06-08 06:49:30'),
(313, '140.253.79.150', 'United States', 1, '2025-06-08 07:48:10'),
(314, '153.205.198.22', 'Japan', 1, '2025-06-08 08:19:39'),
(315, '225.164.148.248', 'India', 1, '2025-06-08 08:29:53'),
(316, '162.101.20.53', 'Brazil', 1, '2025-06-08 10:44:04'),
(317, '240.230.177.194', 'France', 1, '2025-06-08 12:08:49'),
(318, '182.194.170.13', 'Colombia', 1, '2025-06-08 12:47:30'),
(319, '252.34.181.38', 'India', 1, '2025-06-08 12:51:01'),
(320, '153.205.198.22', 'Japan', 1, '2025-06-08 12:57:21'),
(321, '9.99.211.247', 'Italy', 1, '2025-06-08 13:36:16'),
(322, '230.180.210.0', 'Australia', 1, '2025-06-08 13:36:20'),
(323, '99.30.109.201', 'Australia', 1, '2025-06-08 15:09:04'),
(324, '30.197.126.41', 'Germany', 1, '2025-06-08 15:19:20'),
(325, '111.93.131.122', 'Mexico', 1, '2025-06-08 15:24:26'),
(326, '24.166.246.220', 'India', 1, '2025-06-08 15:24:52'),
(327, '46.23.233.74', 'France', 1, '2025-06-08 15:42:04'),
(328, '58.81.230.142', 'United States', 1, '2025-06-08 16:24:37'),
(329, '152.38.248.101', 'Brazil', 1, '2025-06-08 16:26:14'),
(330, '72.151.25.186', 'Colombia', 1, '2025-06-08 16:29:15'),
(331, '113.95.138.149', 'Colombia', 1, '2025-06-08 16:48:58'),
(332, '31.200.138.90', 'Spain', 1, '2025-06-08 16:50:45'),
(333, '153.202.197.216', 'Japan', 1, '2025-06-08 17:37:07'),
(334, '38.231.17.160', 'Australia', 1, '2025-06-08 17:37:33'),
(335, '201.22.20.36', 'Spain', 1, '2025-06-08 18:10:56'),
(336, '138.217.161.153', 'China', 1, '2025-06-08 18:52:53'),
(337, '186.203.199.132', 'Colombia', 1, '2025-06-08 18:56:56'),
(338, '113.91.115.46', 'Australia', 1, '2025-06-08 19:43:57'),
(339, '252.14.85.125', 'Colombia', 1, '2025-06-08 20:28:36'),
(340, '13.100.206.218', 'United Kingdom', 1, '2025-06-08 20:55:44'),
(341, '4.56.11.145', 'France', 1, '2025-06-08 21:06:25'),
(342, '107.58.223.174', 'Brazil', 1, '2025-06-08 21:09:40'),
(343, '218.100.103.214', 'China', 1, '2025-06-08 21:29:04'),
(344, '119.116.224.4', 'Colombia', 1, '2025-06-08 21:53:37'),
(345, '146.242.7.75', 'France', 1, '2025-06-08 23:55:39'),
(346, '42.234.23.182', 'China', 1, '2025-06-08 23:59:13'),
(347, '216.83.24.127', 'China', 1, '2025-06-09 00:07:21'),
(348, '99.3.231.123', 'Japan', 1, '2025-06-09 01:38:32'),
(349, '19.113.255.166', 'Spain', 1, '2025-06-09 02:45:40'),
(350, '22.116.4.184', 'Brazil', 1, '2025-06-09 08:20:19'),
(351, '198.223.12.160', 'Japan', 1, '2025-06-09 09:17:09'),
(352, '104.6.233.123', 'Canada', 1, '2025-06-09 10:16:54'),
(353, '119.85.66.76', 'Australia', 1, '2025-06-09 10:19:12'),
(354, '22.107.213.235', 'India', 1, '2025-06-09 10:58:09'),
(355, '8.39.170.224', 'Russia', 1, '2025-06-09 11:02:30'),
(356, '153.205.198.22', 'Japan', 1, '2025-06-09 14:46:40'),
(357, '85.160.31.187', 'Mexico', 1, '2025-06-09 14:53:01'),
(358, '179.109.10.236', 'France', 1, '2025-06-09 16:47:15'),
(359, '55.2.101.244', 'Canada', 1, '2025-06-09 16:59:50'),
(360, '24.101.181.88', 'Japan', 1, '2025-06-09 17:02:51'),
(361, '93.191.165.251', 'Russia', 1, '2025-06-09 17:21:14'),
(362, '187.151.194.3', 'Brazil', 1, '2025-06-09 17:27:14'),
(363, '114.38.105.155', 'Germany', 1, '2025-06-09 17:32:38'),
(364, '141.175.197.205', 'Russia', 1, '2025-06-09 17:49:30'),
(365, '196.192.116.5', 'Canada', 1, '2025-06-09 17:54:32'),
(366, '226.85.3.19', 'Brazil', 1, '2025-06-09 18:17:27'),
(367, '31.132.58.147', 'Colombia', 1, '2025-06-09 19:19:01'),
(368, '209.251.117.90', 'France', 1, '2025-06-09 20:41:43'),
(369, '36.154.150.34', 'Canada', 1, '2025-06-09 20:51:58'),
(370, '22.82.86.188', 'Russia', 1, '2025-06-09 21:36:39'),
(371, '205.230.24.198', 'Russia', 1, '2025-06-09 21:42:25'),
(372, '169.48.244.51', 'Colombia', 1, '2025-06-09 22:38:44'),
(373, '110.1.188.170', 'Australia', 1, '2025-06-10 01:04:34'),
(374, '59.2.89.182', 'Colombia', 1, '2025-06-10 01:13:35'),
(375, '219.34.25.22', 'Australia', 1, '2025-06-10 01:23:50'),
(376, '111.1.186.156', 'Italy', 1, '2025-06-10 03:17:50'),
(377, '83.116.76.33', 'Australia', 1, '2025-06-10 03:38:24'),
(378, '244.153.31.208', 'France', 1, '2025-06-10 04:30:03'),
(379, '40.152.130.193', 'Spain', 1, '2025-06-10 04:45:56'),
(380, '161.243.223.132', 'United Kingdom', 1, '2025-06-10 05:43:21'),
(381, '39.140.70.190', 'Japan', 1, '2025-06-10 08:00:06'),
(382, '107.224.30.248', 'Russia', 1, '2025-06-10 08:05:26'),
(383, '187.110.244.123', 'India', 1, '2025-06-10 08:51:02'),
(384, '108.223.27.233', 'Canada', 1, '2025-06-10 09:50:29'),
(385, '126.60.176.192', 'Brazil', 1, '2025-06-10 09:51:11'),
(386, '129.73.236.195', 'United Kingdom', 1, '2025-06-10 09:57:07'),
(387, '240.110.88.110', 'Spain', 1, '2025-06-10 13:05:42'),
(388, '168.1.16.74', 'Italy', 1, '2025-06-10 14:05:20'),
(389, '14.253.203.1', 'China', 1, '2025-06-10 14:25:21'),
(390, '13.251.191.202', 'Brazil', 1, '2025-06-10 14:27:14'),
(391, '63.241.250.13', 'China', 1, '2025-06-10 15:50:36'),
(392, '242.113.97.143', 'Mexico', 1, '2025-06-10 16:07:28'),
(393, '96.147.191.2', 'Japan', 1, '2025-06-10 16:50:38'),
(394, '71.21.147.163', 'Mexico', 1, '2025-06-10 17:02:13'),
(395, '87.103.252.183', 'Australia', 1, '2025-06-10 17:17:15'),
(396, '175.28.129.48', 'United Kingdom', 1, '2025-06-10 17:41:05'),
(397, '165.232.155.80', 'India', 1, '2025-06-10 17:48:29'),
(398, '227.31.243.100', 'United States', 1, '2025-06-10 17:51:02'),
(399, '189.99.183.107', 'Colombia', 1, '2025-06-10 18:07:48'),
(400, '7.213.20.229', 'United Kingdom', 1, '2025-06-10 18:25:09'),
(401, '236.74.175.139', 'Canada', 1, '2025-06-10 19:01:46'),
(402, '153.205.198.22', 'Japan', 1, '2025-06-10 19:34:12'),
(403, '8.213.17.216', 'Russia', 1, '2025-06-10 19:35:11'),
(404, '11.225.68.177', 'Germany', 1, '2025-06-10 20:10:21'),
(405, '7.205.234.47', 'Spain', 1, '2025-06-10 20:47:46'),
(406, '8.207.243.83', 'Australia', 1, '2025-06-10 21:51:23'),
(407, '95.127.97.105', 'Mexico', 1, '2025-06-10 22:15:33'),
(408, '82.64.71.164', 'United Kingdom', 1, '2025-06-10 23:25:08'),
(409, '91.107.4.214', 'Colombia', 1, '2025-06-10 23:58:35'),
(410, '28.44.139.51', 'Russia', 1, '2025-06-11 00:08:23'),
(411, '244.97.9.13', 'Colombia', 1, '2025-06-11 01:20:19'),
(412, '146.114.135.78', 'Germany', 1, '2025-06-11 02:50:52'),
(413, '133.49.103.113', 'United States', 1, '2025-06-11 03:24:58'),
(414, '93.107.0.193', 'China', 1, '2025-06-11 03:42:45'),
(415, '27.31.74.23', 'Italy', 1, '2025-06-11 03:59:53'),
(416, '196.105.194.146', 'India', 1, '2025-06-11 04:22:59'),
(417, '117.223.251.74', 'China', 1, '2025-06-11 05:35:07'),
(418, '236.48.43.70', 'Spain', 1, '2025-06-11 06:12:38'),
(419, '80.36.195.101', 'Italy', 1, '2025-06-11 06:23:13'),
(420, '95.107.252.173', 'Spain', 1, '2025-06-11 06:57:43'),
(421, '189.66.19.151', 'Australia', 1, '2025-06-11 06:59:05'),
(422, '115.208.185.42', 'Italy', 1, '2025-06-11 07:12:11'),
(423, '12.203.210.187', 'India', 1, '2025-06-11 07:19:58'),
(424, '200.118.248.118', 'France', 1, '2025-06-11 07:23:26'),
(425, '41.91.76.109', 'France', 1, '2025-06-11 07:37:13'),
(426, '210.167.208.25', 'Colombia', 1, '2025-06-11 07:37:51'),
(427, '176.255.234.149', 'Mexico', 1, '2025-06-11 07:44:22'),
(428, '130.24.241.110', 'United Kingdom', 1, '2025-06-11 07:56:23'),
(429, '120.227.9.131', 'India', 1, '2025-06-11 08:09:51'),
(430, '144.94.38.166', 'Japan', 1, '2025-06-11 08:12:40'),
(431, '115.203.159.186', 'China', 1, '2025-06-11 08:44:06'),
(432, '59.177.199.206', 'Japan', 1, '2025-06-11 08:55:43'),
(433, '163.184.176.75', 'Japan', 1, '2025-06-11 09:01:14'),
(434, '8.179.103.233', 'India', 1, '2025-06-11 09:47:57'),
(435, '200.112.217.237', 'Canada', 1, '2025-06-11 10:07:22'),
(436, '179.6.6.13', 'Canada', 1, '2025-06-11 10:43:45'),
(437, '177.252.219.81', 'United States', 1, '2025-06-11 10:51:08'),
(438, '34.46.130.1', 'Russia', 1, '2025-06-11 11:02:22'),
(439, '90.70.81.194', 'France', 1, '2025-06-11 11:31:59'),
(440, '153.205.198.22', 'Japan', 1, '2025-06-11 13:08:56'),
(441, '153.205.198.22', 'Japan', 1, '2025-06-11 14:32:10'),
(442, '86.44.220.197', 'Colombia', 1, '2025-06-11 14:38:46'),
(443, '164.175.126.107', 'Colombia', 1, '2025-06-11 15:36:07'),
(444, '58.155.89.235', 'Japan', 1, '2025-06-11 15:46:14'),
(445, '146.83.234.152', 'Russia', 1, '2025-06-11 16:25:35'),
(446, '236.17.148.175', 'France', 1, '2025-06-11 17:29:05'),
(447, '204.115.219.239', 'Mexico', 1, '2025-06-11 17:49:35'),
(448, '139.45.64.187', 'Australia', 1, '2025-06-11 17:50:34'),
(449, '153.205.198.22', 'Japan', 1, '2025-06-11 17:53:34'),
(450, '233.0.72.103', 'Russia', 1, '2025-06-11 18:09:03'),
(451, '59.156.91.243', 'France', 1, '2025-06-11 18:26:39'),
(452, '54.128.223.217', 'Italy', 1, '2025-06-11 19:04:24'),
(453, '24.232.67.150', 'Japan', 1, '2025-06-11 19:21:54'),
(454, '71.211.74.248', 'Spain', 1, '2025-06-11 20:11:04'),
(455, '14.178.81.128', 'Brazil', 1, '2025-06-11 20:43:20'),
(456, '12.166.25.139', 'China', 1, '2025-06-11 21:59:02'),
(457, '255.103.5.228', 'Russia', 1, '2025-06-11 22:01:47'),
(458, '163.150.7.97', 'Russia', 1, '2025-06-11 22:45:54'),
(459, '136.8.148.204', 'United Kingdom', 1, '2025-06-12 01:03:08'),
(460, '232.233.215.121', 'Italy', 1, '2025-06-12 01:12:04'),
(461, '158.117.115.223', 'Mexico', 1, '2025-06-12 01:27:14'),
(462, '133.249.79.161', 'Russia', 1, '2025-06-12 02:11:16'),
(463, '185.248.172.120', 'United Kingdom', 1, '2025-06-12 03:29:19'),
(464, '45.59.163.124', 'China', 1, '2025-06-12 03:42:54'),
(465, '107.110.229.48', 'United Kingdom', 1, '2025-06-12 05:03:36'),
(466, '32.249.124.129', 'United States', 1, '2025-06-12 05:25:57'),
(467, '79.220.97.81', 'Brazil', 1, '2025-06-12 08:18:37'),
(468, '162.121.119.231', 'Mexico', 1, '2025-06-12 09:05:17'),
(469, '117.152.152.49', 'Italy', 1, '2025-06-12 09:05:43'),
(470, '153.205.198.22', 'Japan', 1, '2025-06-12 09:25:20'),
(471, '135.239.25.175', 'Russia', 1, '2025-06-12 09:48:39'),
(472, '182.218.34.26', 'Australia', 1, '2025-06-12 10:00:47'),
(473, '206.79.35.195', 'Brazil', 1, '2025-06-12 10:55:58'),
(474, '58.108.110.228', 'Colombia', 1, '2025-06-12 10:59:15'),
(475, '231.204.71.2', 'China', 1, '2025-06-12 11:03:01'),
(476, '88.253.237.171', 'Germany', 1, '2025-06-12 11:45:42'),
(477, '14.139.145.50', 'Australia', 1, '2025-06-12 12:02:41'),
(478, '52.77.227.138', 'United States', 1, '2025-06-12 12:16:27'),
(479, '237.229.180.212', 'United States', 1, '2025-06-12 13:00:44'),
(480, '3.82.146.228', 'Japan', 1, '2025-06-12 13:14:16'),
(481, '89.3.1.254', 'Italy', 1, '2025-06-12 13:27:27'),
(482, '48.49.102.108', 'United Kingdom', 1, '2025-06-12 14:13:23'),
(483, '148.33.236.56', 'Japan', 1, '2025-06-12 15:11:27'),
(484, '191.249.159.51', 'Japan', 1, '2025-06-12 15:13:45'),
(485, '164.115.81.62', 'Italy', 1, '2025-06-12 15:44:27'),
(486, '122.156.160.77', 'Brazil', 1, '2025-06-12 16:20:54'),
(487, '132.206.122.249', 'Spain', 1, '2025-06-12 16:41:57'),
(488, '21.163.243.213', 'Japan', 1, '2025-06-12 16:42:11'),
(489, '92.9.22.87', 'Russia', 1, '2025-06-12 17:05:07'),
(490, '250.28.159.199', 'Brazil', 1, '2025-06-12 17:51:01'),
(491, '13.120.50.145', 'Spain', 1, '2025-06-12 18:06:34'),
(492, '235.202.52.167', 'France', 1, '2025-06-12 18:57:44'),
(493, '53.62.152.63', 'Mexico', 1, '2025-06-12 19:59:14'),
(494, '188.225.48.76', 'Germany', 1, '2025-06-12 20:09:49'),
(495, '54.62.148.43', 'Japan', 1, '2025-06-12 20:30:34'),
(496, '146.9.119.56', 'Italy', 1, '2025-06-12 20:59:48'),
(497, '57.68.168.128', 'Mexico', 1, '2025-06-13 00:03:30'),
(498, '251.14.86.131', 'Canada', 1, '2025-06-13 00:55:44'),
(499, '247.247.235.181', 'United Kingdom', 1, '2025-06-13 02:56:03'),
(500, '46.5.144.194', 'United Kingdom', 1, '2025-06-13 03:32:21'),
(501, '199.1.176.109', 'Brazil', 1, '2025-06-13 04:27:35'),
(502, '221.109.139.111', 'Italy', 1, '2025-06-13 04:29:01'),
(503, '127.150.115.122', 'United States', 1, '2025-06-13 05:47:38'),
(504, '128.156.141.236', 'Japan', 1, '2025-06-13 06:00:30'),
(505, '196.240.99.30', 'Australia', 1, '2025-06-13 06:10:11'),
(506, '90.219.55.131', 'Colombia', 1, '2025-06-13 07:15:36'),
(507, '250.248.236.178', 'China', 1, '2025-06-13 07:42:25'),
(508, '38.208.158.167', 'Russia', 1, '2025-06-13 08:24:23'),
(509, '251.248.231.155', 'Italy', 1, '2025-06-13 10:03:07'),
(510, '170.100.243.151', 'Mexico', 1, '2025-06-13 10:06:30'),
(511, '226.120.177.17', 'Italy', 1, '2025-06-13 10:13:59'),
(512, '131.158.142.238', 'United Kingdom', 1, '2025-06-13 10:17:51'),
(513, '120.101.147.178', 'Spain', 1, '2025-06-13 10:24:06'),
(514, '138.190.23.58', 'Colombia', 1, '2025-06-13 11:32:45'),
(515, '248.225.128.222', 'Australia', 1, '2025-06-13 11:45:16'),
(516, '113.66.245.5', 'Russia', 1, '2025-06-13 11:56:14'),
(517, '242.194.246.136', 'Colombia', 1, '2025-06-13 12:11:39'),
(518, '206.16.229.73', 'China', 1, '2025-06-13 12:39:47'),
(519, '42.217.193.57', 'Russia', 1, '2025-06-13 13:10:54'),
(520, '14.76.85.197', 'China', 1, '2025-06-13 13:19:21'),
(521, '74.119.119.237', 'Mexico', 1, '2025-06-13 14:02:57'),
(522, '153.205.198.22', 'Japan', 1, '2025-06-13 14:37:35'),
(523, '153.205.198.22', 'Japan', 1, '2025-06-13 14:45:58'),
(524, '113.56.197.50', 'Mexico', 1, '2025-06-13 15:03:31'),
(525, '::1', 'Unknown', 1, '2025-06-13 15:16:12'),
(526, '153.205.198.22', 'Japan', 1, '2025-06-13 15:27:46'),
(527, '153.205.198.22', 'Japan', 1, '2025-06-13 15:40:39'),
(528, '153.205.198.22', 'Japan', 1, '2025-06-15 17:10:09'),
(529, '153.205.198.22', 'Japan', 1, '2025-06-16 15:15:33'),
(530, '153.205.198.22', 'Japan', 1, '2025-06-17 20:39:17'),
(531, '153.205.198.22', 'Japan', 1, '2025-06-18 19:16:09'),
(532, '153.205.198.22', 'Japan', 1, '2025-06-19 01:37:45'),
(533, '153.205.198.22', 'Japan', 1, '2025-06-19 11:54:21'),
(534, '153.205.198.22', 'Japan', 1, '2025-06-19 14:05:32'),
(535, '153.205.198.22', 'Japan', 1, '2025-06-22 13:38:48'),
(536, '153.205.198.22', 'Japan', 1, '2025-06-25 14:44:30'),
(537, '153.205.198.22', 'Japan', 1, '2025-06-26 20:24:38'),
(538, '141.46.61.241', 'Germany', 1, '2025-06-28 18:13:45'),
(539, '40.179.75.60', 'United States', 1, '2025-06-28 18:14:05'),
(540, '40.224.125.226', 'United States', 1, '2025-06-28 18:14:56'),
(541, '23.121.157.131', 'United States', 1, '2025-06-28 18:15:37'),
(542, '10.98.135.68', 'China', 1, '2025-06-28 18:15:57'),
(543, '234.13.198.119', 'Colombia', 1, '2025-06-28 18:16:03'),
(544, '249.170.168.184', 'Spain', 1, '2025-06-28 18:16:16'),
(545, '249.170.168.184', 'Spain', 1, '2025-06-28 18:16:19'),
(546, '8.12.238.123', 'United States', 1, '2025-06-28 18:28:27'),
(547, '148.21.177.158', 'United States', 1, '2025-06-28 18:33:05'),
(548, '153.202.197.216', 'Japan', 1, '2025-06-28 18:33:50'),
(549, '153.205.198.22', 'Japan', 1, '2025-06-28 19:09:49'),
(550, '148.21.177.158', 'United States', 1, '2025-06-28 19:14:34'),
(551, '153.205.198.22', 'Japan', 1, '2025-06-28 20:05:19'),
(552, '153.205.198.22', 'Japan', 1, '2025-06-29 18:23:07'),
(553, '153.205.198.22', 'Japan', 1, '2025-06-29 19:45:50'),
(554, '153.205.198.22', 'Unknown', 1, '2025-06-30 14:41:47'),
(555, '153.205.198.22', 'Japan', 1, '2025-06-30 21:32:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cabeceras`
--
ALTER TABLE `cabeceras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_subcategoria` (`id_subcategoria`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitaspaises`
--
ALTER TABLE `visitaspaises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitaspersonas`
--
ALTER TABLE `visitaspersonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cabeceras`
--
ALTER TABLE `cabeceras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `deseos`
--
ALTER TABLE `deseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `visitaspaises`
--
ALTER TABLE `visitaspaises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `visitaspersonas`
--
ALTER TABLE `visitaspersonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD CONSTRAINT `deseos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `deseos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id`);

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
