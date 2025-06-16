<?php
/**
 * Servicio para gestionar los productos
 */

class ProductoService {
    private $db;

    public function __construct($db = null) {
        if ($db === null) {
            $config = require __DIR__ . '/../../app/config/database.php';
            $this->db = new PDO(
                "mysql:host=" . $config['host'] . ";dbname=" . $config['database'] . ";charset=" . $config['charset'],
                $config['username'],
                $config['password'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } else {
            $this->db = $db;
        }
    }

    /**
     * Obtiene un producto por su ID
     */
    public function obtenerProducto($id) {
        try {
            $stmt = $this->db->prepare("
                SELECT p.*, c.ruta as categoria_ruta, s.ruta as subcategoria_ruta
                FROM productos p
                LEFT JOIN categorias c ON p.id_categoria = c.id
                LEFT JOIN subcategorias s ON p.id_subcategoria = s.id
                WHERE p.id = :id
            ");
            $stmt->execute(['id' => $id]);
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($producto) {
                // Construir la ruta de la imagen
                if (!empty($producto['portada'])) {
                    if (!str_starts_with($producto['portada'], 'http')) {
                        $producto['imagen'] = '/ROPAAFRICANA/backend/' . $producto['portada'];
                    } else {
                        $producto['imagen'] = $producto['portada'];
                    }
                } else {
                    // Imagen por defecto si no hay portada
                    $producto['imagen'] = '/ROPAAFRICANA/backend/vistas/img/productos/default.jpg';
                }
            }

            return $producto;
        } catch (Exception $e) {
            error_log("Error al obtener producto: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Obtiene todos los productos
     */
    public function obtenerProductos($limite = null, $offset = null) {
        $sql = "
            SELECT p.*, c.categoria, s.subcategoria 
            FROM productos p
            LEFT JOIN categorias c ON p.id_categoria = c.id
            LEFT JOIN subcategorias s ON p.id_subcategoria = s.id
            ORDER BY p.fecha DESC
        ";
        
        if ($limite !== null) {
            $sql .= " LIMIT ?";
            if ($offset !== null) {
                $sql .= " OFFSET ?";
            }
        }
        
        $stmt = $this->db->prepare($sql);
        
        if ($limite !== null) {
            if ($offset !== null) {
                $stmt->execute([$limite, $offset]);
            } else {
                $stmt->execute([$limite]);
            }
        } else {
            $stmt->execute();
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene productos por categoría
     */
    public function obtenerProductosPorCategoria($categoriaId, $limit = 12, $offset = 0) {
        try {
            $stmt = $this->db->prepare("
                SELECT p.*, c.ruta as categoria_ruta, s.ruta as subcategoria_ruta
                FROM productos p
                LEFT JOIN categorias c ON p.id_categoria = c.id
                LEFT JOIN subcategorias s ON p.id_subcategoria = s.id
                WHERE p.id_categoria = :categoria_id
                ORDER BY p.id DESC
                LIMIT :limit OFFSET :offset
            ");
            $stmt->bindValue(':categoria_id', $categoriaId, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Procesar las imágenes
            foreach ($productos as &$producto) {
                if (!empty($producto['portada']) && !str_starts_with($producto['portada'], 'http')) {
                    $producto['imagen'] = '/ROPAAFRICANA/backend/' . $producto['portada'];
                } else {
                    $producto['imagen'] = $producto['portada'];
                }
            }
            
            return $productos;
        } catch (Exception $e) {
            error_log("Error al obtener productos por categoría: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Busca productos por término
     */
    public function buscarProductos($termino, $limit = 12, $offset = 0) {
        try {
            $stmt = $this->db->prepare("
                SELECT p.*, c.ruta as categoria_ruta, s.ruta as subcategoria_ruta
                FROM productos p
                LEFT JOIN categorias c ON p.id_categoria = c.id
                LEFT JOIN subcategorias s ON p.id_subcategoria = s.id
                WHERE p.titulo LIKE :termino 
                OR p.descripcion LIKE :termino
                ORDER BY p.id DESC
                LIMIT :limit OFFSET :offset
            ");
            $termino = "%$termino%";
            $stmt->bindValue(':termino', $termino, PDO::PARAM_STR);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Procesar las imágenes
            foreach ($productos as &$producto) {
                if (!empty($producto['portada']) && !str_starts_with($producto['portada'], 'http')) {
                    $producto['imagen'] = '/ROPAAFRICANA/backend/' . $producto['portada'];
                } else {
                    $producto['imagen'] = $producto['portada'];
                }
            }
            
            return $productos;
        } catch (Exception $e) {
            error_log("Error al buscar productos: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Verifica el stock disponible
     */
    public function verificarStock($id) {
        $producto = $this->obtenerProducto($id);
        return $producto ? true : false;
    }

    /**
     * Obtiene productos destacados
     */
    public function obtenerProductosDestacados($limit = 12) {
        try {
            $stmt = $this->db->prepare("
                SELECT p.*, c.ruta as categoria_ruta, s.ruta as subcategoria_ruta
                FROM productos p
                LEFT JOIN categorias c ON p.id_categoria = c.id
                LEFT JOIN subcategorias s ON p.id_subcategoria = s.id
                WHERE p.destacado = 1
                ORDER BY p.id DESC
                LIMIT :limit
            ");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Procesar las imágenes
            foreach ($productos as &$producto) {
                if (!empty($producto['portada']) && !str_starts_with($producto['portada'], 'http')) {
                    $producto['imagen'] = '/ROPAAFRICANA/backend/' . $producto['portada'];
                } else {
                    $producto['imagen'] = $producto['portada'];
                }
            }
            
            return $productos;
        } catch (Exception $e) {
            error_log("Error al obtener productos destacados: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtiene productos relacionados
     */
    public function obtenerProductosRelacionados($productoId, $limite = 4) {
        $producto = $this->obtenerProducto($productoId);
        if (!$producto) return [];

        $stmt = $this->db->prepare("
            SELECT p.*, c.categoria, s.subcategoria 
            FROM productos p
            LEFT JOIN categorias c ON p.id_categoria = c.id
            LEFT JOIN subcategorias s ON p.id_subcategoria = s.id
            WHERE p.id_categoria = ? AND p.id != ?
            ORDER BY p.fecha DESC
            LIMIT ?
        ");
        $stmt->execute([$producto['id_categoria'], $productoId, $limite]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene las categorías disponibles
     */
    public function obtenerCategorias() {
        $stmt = $this->db->prepare("
            SELECT c.*, 
                   COUNT(p.id) as total_productos
            FROM categorias c
            LEFT JOIN productos p ON c.id = p.id_categoria
            GROUP BY c.id
            ORDER BY c.categoria ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene las subcategorías de una categoría
     */
    public function obtenerSubcategorias($categoriaId) {
        $stmt = $this->db->prepare("
            SELECT s.*, 
                   COUNT(p.id) as total_productos
            FROM subcategorias s
            LEFT JOIN productos p ON s.id = p.id_subcategoria
            WHERE s.id_categoria = ?
            GROUP BY s.id
            ORDER BY s.subcategoria ASC
        ");
        $stmt->execute([$categoriaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} 