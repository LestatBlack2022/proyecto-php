<?php
class Conexion {
    public static function conectar() {
        $host = "localhost";
        $usuario = "root";
        $contrasena = "";
        $bd = "test";

        $conn = new mysqli($host, $usuario, $contrasena, $bd);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>