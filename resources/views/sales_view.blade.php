<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
    <div class="w-auto p-3">
    <div class="w-auto p-3">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Ventas</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="#">Clientes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="w-auto p-3">
    <div class="w-75 p-3">
        <h2>Ventas</h2>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id venta</th>
                <th scope="col">Cantidad de producto</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio / U</th>
                <th scope="col">Comprador</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($sale as $item_sales)
                <tr>
                    <td>{{$item_sales->id}}</td>
                    <td>{{$item_sales->amount_products}}</td>
                    <td>{{$item_sales->product->name_product}}</td>
                    <td>{{$item_sales->product->unitarie_price}}</td>
                    <td>{{$item_sales->client->name_client}}</td>
                    <td> ${{ $item_sales->amount_products * $item_sales->product->unitarie_price }} pesos</td>
                </tr>    
            @endforeach

            </tbody>
        </table>
        
    </div>
    <div class="w-25 p-3 position-fixed top-0 end-0 h-100 bg-light"></div>
    </div>

</div>
</body>

</html>