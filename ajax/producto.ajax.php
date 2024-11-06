<?php

require_once "../controlador/producto.controlador.php";
require_once "../modelo/producto.modelo.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $bodega = $_POST['bodega'];
    $sucursal = $_POST['sucursal'];
    $moneda = $_POST['moneda'];
    $precio = $_POST['precio'];
    $material = isset($_POST['material']) ? implode(',', $_POST['material']) : '';  // Si hay múltiples materiales seleccionados
    $descripcion = $_POST['descripcion'];

    // Verificar si el código ya está registrado
    if (ProductoControlador::ctrExisteCodigo($codigo)) {
        echo json_encode(['success' => false, 'message' => 'El código del producto ya está registrado.']);
        exit;
    }

    // Llamar al controlador para insertar el producto
    $respuesta = ProductoControlador::ctrCrearProducto($codigo, $nombre, $bodega, $sucursal, $moneda, $precio, $material, $descripcion);

    // Devolver la respuesta
    echo json_encode($respuesta);
}
