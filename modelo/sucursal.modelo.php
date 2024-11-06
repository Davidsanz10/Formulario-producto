<?php
require_once "conexion.php";

class SucursalModelo
{
    static public function mdlListarSucursales($codigoBodega)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_sucursal, nombre_sucursal FROM sucursal WHERE codigo_bodega = :codigo_bodega ORDER BY id_sucursal ASC");
        $stmt->bindParam(":codigo_bodega", $codigoBodega, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
