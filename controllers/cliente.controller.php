<?php

require_once('../models/cliente.model.php');
$cliente = new Clase_Cliente();

switch ($_GET['op']) {
    case "probar":
        $datos = $cliente->probar();
        echo json_encode($datos);
        break;

    case "todos":
        $datos = $cliente->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case "uno":
        $id = $_POST["id"];
        $datos = $cliente->uno($id);
        echo json_encode(mysqli_fetch_assoc($datos));
        break;

    case "insertar":
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $datos = $cliente->insertar($nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;

    case "actualizar":
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $datos = $cliente->actualizar($id, $nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;

    case "eliminar":
        $id = $_POST["id"];
        $datos = $cliente->eliminar($id);
        echo json_encode($datos);
        break;

    case "buscarXNombre":
        $nombre = $_POST["nombre"];
        $datos = $cliente->buscarXNombre($nombre);
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
}
?>