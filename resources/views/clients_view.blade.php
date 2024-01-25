<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes registrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('products_admin') }}">Productos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('products_client') }}">Comprar productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sales') }}">Ventas</a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
    <div class="w-auto p-3">
    

    <div class="w-auto p-3">
    <div class="w-75 p-3">
    <h2>Modulo de información y edición de clientes</h2>
        
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($clients as $item_client)
            <div class="col">
                <div class="card">
                <img src="https://static.wixstatic.com/media/522844_3b0124aa248d4a6b9f86275889e74427~mv2.gif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Perfil de cliente: {{$item_client->name_client}}</h5>
                    <a href="{{ route('delete_client', ['id' => $item_client->id]) }}" class="btn btn-danger">Eliminar</a>
                </div>
                </div>
            </div>      
        @endforeach
    </div>
    </div>
    <div class="w-25 p-3 position-fixed top-0 end-0 h-100 bg-light">
        <h2>Formulario clientes
        </h2> 
        <br>
        <form class="row g-3" action="/ClientsAdmin" method="POST">
            @csrf
            @if (session('Exito'))
                <h5 class="alert alert-success">{{session('Exito')}}</h5>
            @endif
            @if (session('Error'))
            <h5 class="alert alert-warning">{{session('Error')}}</h5>
            @endif
            @error('name_client')
            <h5 class="alert alert-warning">{{$message}}</h5>    
            @enderror
            <label for="basic-url" class="form-label">Nombre del cliente</label>
            <div class="input-group mb-3">
                <input type="text" name="name_client" class="form-control" placeholder="Ingrese un cliente" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Registrar cliente</button>
            </div>
        </form>

    </div>
    </div>


</div>
</body>

</html><