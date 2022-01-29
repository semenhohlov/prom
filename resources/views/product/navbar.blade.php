<h4>Товары:</h4>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url('/product') }}">Все товары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url('/product') }}">Дерево</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2"
                type="search"
                placeholder="Поиск"
                aria-label="Search"
                value="{{ $search ?? '' }}"
                name="search">
            <button class="btn btn-outline-success" type="submit">&#128269;</button>
        </form>
    </div>
</nav>