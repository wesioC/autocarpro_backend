@php
    $veiculos = \App\Models\Veiculo::all();
@endphp
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CarApp</title>
</head>

<body>
    <!-- Navbar -->
    <ul class="navbar nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="#">Proprietario</a>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Carros</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Revisoes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Ajuda</a>
        </li>
    </ul>

    <div class="content container">
        <h1>CarApp: o seu melhor amigo para gerenciar os carros dos seus clientes!</h1>

        <ul>
      
        @foreach($veiculos as $veiculo)
        <li>{{ $veiculo->marca }} - {{ $veiculo->modelo }}</li>
        @endforeach
    </ul>
    </div>

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>