<?php

require_once "conexion.php";

class BodegaModelo
{
    static public function mdlListarBodega()
    {

        $stmt = Conexion::conectar()->prepare("SELECT  codigo_bodega,
                                                        nombre_bodega from bodega");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}