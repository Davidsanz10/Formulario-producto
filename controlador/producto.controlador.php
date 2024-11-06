<?php



class ProductoControlador {

    static public function ctrCrearProducto($codigo, $nombre, $bodega, $sucursal, $moneda, $precio, $material, $descripcion) {
        $respuesta = ProductoModelo::mdlCrearProducto($codigo, $nombre, $bodega, $sucursal, $moneda, $precio, $material, $descripcion);
        return $respuesta;
    }

    static public function ctrExisteCodigo($codigo) {
        $respuesta = ProductoModelo::mdlExisteCodigo($codigo);
        return $respuesta;
    }

}
