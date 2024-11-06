<?php

require_once "conexion.php";

class ProductoModelo {

    public static function mdlExisteCodigo($codigo) {
        // Conectar a la base de datos
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM producto WHERE codigo_producto = :codigo");
        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $stmt->execute();
         // Obtener el resultado
         $count = $stmt->fetchColumn();
         

        // Retornar verdadero si el código existe, falso de lo contrario
        return $count > 0;
    }

    static public function mdlCrearProducto($codigo, $nombre, $bodega, $sucursal, $moneda, $precio, $material, $descripcion) {
        // Establecer la conexión a la base de datos
        $stmt = Conexion::conectar()->prepare("INSERT INTO producto (codigo_producto, nombre_producto, codigo_bodega, id_sucursal, id_moneda, precio_producto, material_producto, descripcion_producto) 
                                                VALUES (:codigo, :nombre, :bodega, :sucursal, :moneda, :precio_producto, :material_producto, :descripcion_producto)");

        // Vincular los parámetros con los valores
        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":bodega", $bodega, PDO::PARAM_STR);
        $stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
        $stmt->bindParam(":moneda", $moneda, PDO::PARAM_INT);
        $stmt->bindParam(":precio_producto", $precio, PDO::PARAM_STR);
        $stmt->bindParam(":material_producto", $material, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion_producto", $descripcion, PDO::PARAM_STR);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return ["success" => true, "message" => "Producto insertado correctamente"];
        } else {
            return ["success" => false, "message" => "Error al insertar el producto"];
        }
    }



}
