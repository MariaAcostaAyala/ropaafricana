<?php
// Cargar el bootstrap de la aplicación
require_once __DIR__ . '/../../app/bootstrap.php';

class Conexion {
	static public function conectar() {
		try {
			$link = new PDO(
				"mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
				DB_USER,
				DB_PASS,
				array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_EMULATE_PREPARES => false,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				)
			);
			return $link;
		} catch (PDOException $e) {
			error_log("Error de conexión a la base de datos: " . $e->getMessage());
			throw new Exception("Error de conexión a la base de datos. Por favor, contacte al administrador.");
		}
	}
}