<?php
require_once "../controlador/bodega.controlador.php";
require_once "../modelo/bodega.modelo.php";

class AjaxBodega {
    public function ajaxListarBodega() {
        $listaBodega = BodegaControlador::ctrListarBodega();
        
        // Configurar la cabecera y devolver el JSON
        header('Content-Type: application/json');
        echo json_encode($listaBodega);
    }
}

// Crear una instancia y ejecutar el método para listar bodega
$bodegaAjax = new AjaxBodega();
$bodegaAjax->ajaxListarBodega();