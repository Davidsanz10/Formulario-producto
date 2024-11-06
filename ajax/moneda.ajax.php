<?php
require_once "../controlador/moneda.controlador.php";
require_once "../modelo/moneda.modelo.php";

class AjaxMoneda {
    public function ajaxListarMonedas() {
        $listaMonedas = MonedaControlador::ctrListarMoneda();
        
        // Configurar la cabecera y devolver el JSON
        header('Content-Type: application/json');
        echo json_encode($listaMonedas);
    }
}

// Crear una instancia y ejecutar el método para listar monedas
$monedaAjax = new AjaxMoneda();
$monedaAjax->ajaxListarMonedas();