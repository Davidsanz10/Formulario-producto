document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita el envío del formulario

        // Validación de Código del Producto
        const codigo = document.getElementById("codigo").value.trim();
        const codigoRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,15}$/;

        if (!codigo) {
            alert("El código del producto no puede estar en blanco.");
            return;
        }
        if (!codigoRegex.test(codigo)) {
            alert("El código del producto debe contener letras y números");
            return;
        }
        if (codigo.length < 5 || codigo.length > 15) {
            alert("El código del producto debe tener entre 5 y 15 caracteres.");
            return;
        }
        // Aquí se debería hacer la verificación de unicidad en la base de datos
        // Ejemplo: consulta a la base de datos para verificar si ya existe

        // Validación de Nombre del Producto
        const nombre = document.getElementById("nombre").value.trim();

        if (!nombre) {
            alert("El nombre del producto no puede estar en blanco.");
            return;
        }
        if (nombre.length < 2 || nombre.length > 50) {
            alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
            return;
        }

        // Validación de Precio del Producto
        const precio = document.getElementById("precio").value.trim();
        const precioRegex = /^\d+(\.\d{1,2})?$/;

        if (!precio) {
            alert("El precio del producto no puede estar en blanco.");
            return;
        }
        if (!precioRegex.test(precio)) {
            alert("El precio del producto debe ser un número positivo con hasta dos decimales.");
            return;
        }

        // Validación de Material del Producto (al menos dos seleccionados)
        const materiales = document.querySelectorAll('input[name="material[]"]:checked');
        if (materiales.length < 2) {
            alert("Debe seleccionar al menos dos materiales para el producto.");
            return;
        }

        // Validación de Bodega
        const bodega = document.getElementById("bodega").value;
        if (!bodega) {
            alert("Debe seleccionar una bodega.");
            return;
        }

        // Validación de Sucursal
        const sucursal = document.getElementById("sucursal").value;
        if (!sucursal) {
            alert("Debe seleccionar una sucursal para la bodega seleccionada.");
            return;
        }

        // Validación de Moneda
        const moneda = document.getElementById("moneda").value;
        if (!moneda) {
            alert("Debe seleccionar una moneda para el producto.");
            return;
        }

        // Validación de Descripción del Producto
        const descripcion = document.getElementById("descripcion").value.trim();

        if (!descripcion) {
            alert("La descripción del producto no puede estar en blanco.");
            return;
        }
        if (descripcion.length < 10 || descripcion.length > 1000) {
            alert("La descripción del producto debe tener entre 10 y 1000 caracteres.");
            return;
        }

        // Si todas las validaciones son correctas, el formulario se puede enviar
        form.submit();
    });
});
