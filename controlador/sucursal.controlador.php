<?php
// require_once "sucursal.modelo.php";

class SucursalControlador
{
    static public function ctrListarSucursales($codigoBodega)
    {
        $listaSucursales = SucursalModelo::mdlListarSucursales($codigoBodega);
        return $listaSucursales;
    }
}
?>
