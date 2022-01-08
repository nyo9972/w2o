<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="https://use.fontawesome.com/6863656d9d.js"></script>
<link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">

<!DOCTYPE html>
<html lang="ptbr">

<head>
    <title>W2O</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <nav class="navbar bg-secondary">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Catalogo - Farol Acessórios automotivos</a>
            </div>
            <ul class="text-light nav navbar-nav">
                <li class="active"><a href="{{ route('companyIndex') }}">Cadastro Empresarial</a></li>
                <li><a class="text-light" href="{{ route('colaboratorIndex') }}">Cadastro De Colaboradores</a></li>
            </ul>
        </div>
    </nav>
</body>

</html>
