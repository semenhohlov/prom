<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>База товаров для Prom</title>
</head>
<body>
    <div class="container">
        <header>
            <h2>Header</h2>
        </header>
        <div class="row">
            <div class="col-3">
                <nav class="navbar navbar-light bg-light">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="import">Импорт</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">Экспорт</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="category">Категории</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="product">Товары</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">Метки</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        <footer>
            <h4>Footer</h4>
        </footer>
        </div>
    </div>
</body>
</html>