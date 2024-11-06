<?php

require_once "conexion.php";

class MonedaModelo
{
    static public function mdlListarMoneda()
    {

        $stmt = Conexion::conectar()->prepare("SELECT  id_moneda,
                                                        simbolo_moneda,
                                                        nombre_moneda from moneda");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}