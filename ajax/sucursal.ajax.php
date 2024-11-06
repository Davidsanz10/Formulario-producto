<?php
require_once "../controlador/sucursal.controlador.php";
require_once "../modelo/sucursal.modelo.php";

if (isset($_GET['codigo_bodega'])) {
    $codigoBodega = $_GET['codigo_bodega'];
    $listaSucursales = SucursalControlador::ctrListarSucursales($codigoBodega);
    echo json_encode($listaSucursales);
} else {
    echo json_encode([]);
}
?>
