<?php
    require_once './config.php';

    function guardar($texto) {
        $conn = Conexion::conectar();

        $stmt = $conn->prepare("INSERT INTO tabla (texto) VALUES (?)");
        $stmt->bind_param("s", $texto);

        if ($stmt->execute()) {
            return "Registrado correctamente.";
        } else {
            return "Error al registrar: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }    

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $respuesta = "GET";
            break;
        case 'POST':
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $respuesta = "POST :: ". guardar($data->texto);
            break;
        case 'PUT':
            $respuesta = "PUT";
            break;
        case 'DELETE':
            $respuesta = "DELETE";
            break;
        default:
            $respuesta = "ERROR";
    }   

    echo json_encode(["texto" => $respuesta]);
    
?>