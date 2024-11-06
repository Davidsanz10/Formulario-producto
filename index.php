<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <link rel="stylesheet" href="vista/css/vista.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="vista/js/vista.js"></script>
</head>

<body>
    <form id="formProducto" action="ajax/producto.ajax.php" method="POST">
        <div class="form-container">
            <h1>Formulario de Producto</h1>
            <form>
                <!-- Código del Producto -->
                <div class="form-group">
                    <label for="codigo">Código del Producto</label>
                    <input type="text" id="codigo" name="codigo" minlength="5" maxlength="15" pattern="[A-Za-z0-9]+" title="Debe contener letras y números">
                </div>

                <!-- Nombre del Producto -->
                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" id="nombre" name="nombre" minlength="2" maxlength="50" required>
                </div>

                <!-- Bodega -->
                <div class="form-group">
                    <label for="bodega">Bodega</label>
                    <select id="bodega" name="bodega" required>
                        <option value="">Seleccione una bodega</option>
                    </select>
                </div>

                <!-- Sucursal -->
                <div class="form-group">
                    <label for="sucursal">Sucursal</label>
                    <select id="sucursal" name="sucursal" required>
                        <option value="">Seleccione una sucursal</option>
                    </select>
                </div>

                <!-- Moneda -->
                <div class="form-group">
                    <label for="moneda">Moneda</label>
                    <select id="moneda" name="moneda" required>
                        <option value="">Seleccione una moneda</option>
                    </select>
                </div>

                <!-- Precio -->
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" name="precio" required pattern="^\d+(\.\d{1,2})?$" title="Debe ser un número positivo con hasta dos decimales">
                </div>

                <!-- Material del Producto -->
                <div class="form-group">
                    <label>Material del Producto</label>
                    <div class="material-group">
                        <input type="checkbox" id="plastico" name="material[]" value="Plástico">
                        <label for="plastico">Plástico</label>
                        <input type="checkbox" id="metal" name="material[]" value="Metal">
                        <label for="metal">Metal</label>
                        <input type="checkbox" id="madera" name="material[]" value="Madera">
                        <label for="madera">Madera</label>
                        <input type="checkbox" id="vidrio" name="material[]" value="Vidrio">
                        <label for="vidrio">Vidrio</label>
                        <input type="checkbox" id="textil" name="material[]" value="Textil">
                        <label for="textil">Textil</label>
                    </div>
                    <small>Seleccione al menos dos opciones</small>
                </div>

                <!-- Descripción del Producto -->
                <div class="form-group">
                    <label for="descripcion">Descripción del Producto</label>
                    <textarea id="descripcion" name="descripcion" minlength="10" maxlength="1000" required></textarea>
                </div>

                <!-- Botón de Guardar -->
                <button type="submit">Guardar Producto</button>
            </form>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            // Listar Moneda
            $.ajax({
                url: "ajax/moneda.ajax.php",
                method: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.length > 0) {
                        response.forEach(function(moneda) {
                            $('#moneda').append(
                                `<option value="${moneda.id_moneda}">${moneda.simbolo_moneda} - ${moneda.nombre_moneda}</option>`
                            );
                        });
                    } else {
                        $('#moneda').append('<option value="">No hay monedas disponibles</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar las monedas:", error);
                    console.log("Respuesta del servidor:", xhr.responseText);
                }
            });

            // Listar Bodega
            $.ajax({
                url: "ajax/bodega.ajax.php",
                method: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.length > 0) {
                        response.forEach(function(bodega) {
                            $('#bodega').append(
                                `<option value="${bodega.codigo_bodega}">${bodega.nombre_bodega}</option>`
                            );
                        });
                    } else {
                        $('#bodega').append('<option value="">No hay bodegas disponibles</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar las bodegas:", error);
                    console.log("Respuesta del servidor:", xhr.responseText);
                }
            });

            // Cargar sucursales al seleccionar una bodega
            $('#bodega').change(function() {
                const codigoBodega = $(this).val();

                if (codigoBodega) {
                    $.ajax({
                        url: "ajax/sucursal.ajax.php",
                        method: "GET",
                        data: {
                            codigo_bodega: codigoBodega
                        },
                        dataType: "json",
                        success: function(response) {
                            $('#sucursal').empty().append('<option value="">Seleccione una sucursal</option>');

                            if (response.length > 0) {
                                response.forEach(function(sucursal) {
                                    $('#sucursal').append(
                                        `<option value="${sucursal.id_sucursal}">${sucursal.nombre_sucursal}</option>`
                                    );
                                });
                            } else {
                                $('#sucursal').append('<option value="">No hay sucursales disponibles</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error al cargar las sucursales:", error);
                            console.log("Respuesta del servidor:", xhr.responseText);
                        }
                    });
                } else {
                    $('#sucursal').empty().append('<option value="">Seleccione una sucursal</option>');
                }
            });
            // Capturar el envío del formulario
            $('#formProducto').on('submit', function(event) {
                event.preventDefault(); // Prevenir el envío del formulario

                // Recoger datos del formulario
                const formData = $(this).serialize();

                // Enviar datos por AJAX
                $.ajax({
                    url: "ajax/producto.ajax.php",
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(res) {
                        if (res.success) {
                            alert(res.message); // Mostrar el mensaje de éxito
                            window.location.href = 'index.php'; 
                            $('#formProducto')[0].reset(); // Resetear el formulario
                         
                        } else {
                            alert(res.message); // Mostrar el mensaje de error
                            window.location.href = 'index.php'; 
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Ocurrió un error al procesar la solicitud."); // Mensaje de error genérico
                        console.error("Error al procesar la solicitud:", error);
                        window.location.href = 'index.php'; 
                    }
                });
            });
        });
        // $(document).ready(function() {

        // });
    </script>
</body>

</html>