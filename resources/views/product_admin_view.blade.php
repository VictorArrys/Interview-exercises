<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('sales') }}">Ventas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients_admin') }}">Clientes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="w-auto p-3">
    <div class="w-75 p-3">
        <h2>Productos</h2>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($producto as $item_product)
                <tr>
                    <td>{{$item_product->id}}</td>
                    <td>{{$item_product->name_product}}</td>
                    <td>{{$item_product->unitarie_price}}</td>
                    <td>
                        <a href="{{ route('delete_product', ['id' => $item_product->id]) }}" class="btn btn-danger">Eliminar</a>
                        
                    </td>
                </tr>    

            @endforeach

            </tbody>
        </table>
    </div>
    <div class="w-25 p-3 position-fixed top-0 end-0 h-100 bg-light">
        <h2>Administración productos
        </h2> 
        <br>
        <form class="row g-3" action="/ProductAdmin" method="POST">
            @csrf
            @if (session('Exito'))
                <h5 class="alert alert-success">{{session('Exito')}}</h5>
            @endif
            @if (session('Error'))
            <h5 class="alert alert-warning">{{session('Error')}}</h5>
            @endif
            @error('name_product')
            <h5 class="alert alert-warning">{{$message}}</h5>    
            @enderror
            @error('unitarie_price')
            <h5 class="alert alert-warning">{{$message}}</h5>    
            @enderror
            <label for="basic-url" class="form-label">Producto</label>
            <div class="input-group mb-3">
                <input type="text" name="name_product" class="form-control" placeholder="Ingrese un producto" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            <label for="basic-url" class="form-label">Precio</label>    
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">$</span>
                <input type="text" name="unitarie_price" class="form-control" placeholder="Precio unitario" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Agregar producto</button>
            </div>
        </form>

    </div> 

    </div>

</body>

</html>
