<?php

class BodegaControlador{
    static public function ctrListarBodega() {
        return BodegaModelo::mdlListarBodega();
    }

}