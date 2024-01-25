// Arreglo local para almacenar los productos en la tabla
var productosEnTabla = [];

function agregarACompra(id, nombre, precio) {
    //  si el producto ya está en la lista de compra
    var filaExistente = document.querySelector(`#compra-${id}`);

    if (filaExistente) {
        // Si ya existe la fila, actualizar la cantidad
        var cantidadActual = parseInt(filaExistente.querySelector('.cantidad').innerText);
        filaExistente.querySelector('.cantidad').innerText = cantidadActual + 1;

        // Obtener el precio unitario y calcular el nuevo precio total
        var precioUnitario = parseFloat(filaExistente.querySelector('.precio').innerText);
        var nuevoPrecioTotal = (cantidadActual + 1) * precioUnitario;

        // Actualizar el precio total en la fila existente
        filaExistente.querySelector('.precio_total').innerText = nuevoPrecioTotal.toFixed(2);

        // Actualizar los campos de formulario
        var input_amount = document.querySelector('amount_products');
        input_amount = cantidadActual + 1; 
        console.log(input_amount);
        var input_total = document.querySelector('total');
        input_total = nuevoPrecioTotal.toFixed(2);
        console.log(input_total);

    } else {
        // Si no existe la fila, agregar una nueva
        var tablaCompra = document.querySelector('#tabla-compra tbody');

        var nuevaFila = document.createElement('tr');
        nuevaFila.id = `compra-${id}`;
        var $amount = 1;
        nuevaFila.innerHTML = `
            <td name="product_id_t">
                <input type="hidden" name="product_id" value="${id}">${id}
            </td>
            <td>${nombre}</td>
            <td name="amount_products_t" class="cantidad">
                <input name="amount_products" class="form-control" value="${$amount}">1
            </td>
            <td class="precio">
                <input type="hidden" name="unit_price" value="${precio}">
                ${precio}</td>
            <td name="total_t" class="precio_total">                        
                <input name="total" value="${precio}" class="form-control">
                ${precio}
            </td>
            <td><button class="btn btn-danger" onclick="eliminarProducto(${id})">Eliminar</button></td>
        `;
        tablaCompra.appendChild(nuevaFila);
    }
}

function eliminarProducto(id) {
    var fila = document.querySelector(`#compra-${id}`);

    if (fila) {
        // Obtenemción de cantidad
        var cantidadActual = parseInt(fila.querySelector('.cantidad').innerText);

        // Si hay más de 1, simplemente disminuir la cantidad
        if (cantidadActual > 1) {
            fila.querySelector('.cantidad').innerText = cantidadActual - 1;
        } else {
            // En caso de ser 1, elimina la fila
            fila.remove();
        }
    }
}
