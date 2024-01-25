    // Arreglo local para almacenar los productos en la tabla
    var productosEnTabla = [];

    function agregarACompra(id, nombre, precio) {
            var productoExistente = productosEnTabla.find(producto => producto.id === id);

            if (productoExistente) {
                // Si el producto ya existe en la tabla, actualizar la cantidad y el precio total
                productoExistente.cantidad += 1;
                productoExistente.precioTotal = productoExistente.cantidad * precio;
            } else {
                // Si el producto no existe, agregarlo al arreglo
                productosEnTabla.push({
                    id: id,
                    nombre: nombre,
                    cantidad: 1,
                    precioUnitario: precio,
                    precioTotal: precio
                });
            }

            // Actualizar la tabla con los productos
            actualizarTablaCompra();
        }

        function actualizarTablaCompra() {
            var tablaCompra = document.querySelector('#tabla-compra tbody');
            tablaCompra.innerHTML = '';

            productosEnTabla.forEach(producto => {
                var nuevaFila = document.createElement('tr');
                nuevaFila.innerHTML = `
                    <td name="product_id">
                        <input type="hidden" name="product_id" value="${producto.id}">${producto.id}
                    </td>
                    <td>${producto.nombre}</td>
                    <td name="amount_products" class="cantidad">
                        <input name="amount_products" class="form-control" value="${producto.cantidad}">
                    </td>
                    <td class="precio">
                        <input type="hidden" name="unit_price" value="${producto.precioUnitario}">
                        ${producto.precioUnitario}
                    </td>
                    <td name="total" class="precio_total">                        
                        <input name="total" value="${producto.precioTotal}" class="form-control">
                        ${producto.precioTotal}
                    </td>
                    <td><button class="btn btn-danger" onclick="eliminarProducto(${producto.id})">Eliminar</button></td>
                `;
                tablaCompra.appendChild(nuevaFila);
                console.log(productosEnTabla);
            });
        }
        
        // Función para enviar la compra al servidor mediante AJAX
    function enviarCompra() {
        // Obtener el formulario
        var formulario = document.getElementById('form-compra');
        //event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        // Verifica que haya productos en la tabla antes de enviar la petición
        if (productosEnTabla.length > 0) {
            // Convierte el arreglo de productos a formato JSON
            var data = JSON.stringify(productosEnTabla);

            // Realiza la petición AJAX
            // Asegúrate de especificar la ruta correcta en la URL
            // Puedes cambiar '/url_del_controlador' por la ruta correspondiente
            $.ajax({
                type: "POST",
                url: '/ProductsClient', // Reemplaza '/url_del_controlador' con la ruta correcta
                contentType: 'application/json',
                data: data,
                success: function (response) {
                    console.log(response);
                    // Puedes realizar acciones adicionales después de una respuesta exitosa
                },
                error: function (error) {
                    console.error("Error en la petición AJAX:", error.responseText);
                }
            });
        } else {
            console.error("No hay productos para enviar.");
        }
    }

    // Agregar un event listener al formulario para ejecutar la función enviarCompraAjax
    document.getElementById('form-compra').addEventListener('submit', function (event) {
        event.preventDefault(); // Evitar el envío tradicional del formulario
        enviarCompra(); // Llamar a la función para enviar la compra mediante AJAX
    });

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