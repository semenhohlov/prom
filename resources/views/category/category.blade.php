@extends('layout')

@section('content')

<h4>Категории:</h4>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url('/category') }}">Все</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url('/category/tree') }}">Дерево</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                    href="#" id="navbarDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="true">
                    Импорт категорий
                </a>
                <div class="dropdown-menu"
                    aria-labelledby="navbarDropdown"
                    id="importForm"
                    style="width:500px; padding:20px"
                >
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="filename">Выбор файла:</label>
                            <input class="form-control" type="file" name="filename">
                        </div>
                        <input class="btn btn-primary" type="submit" value="Загрузить">
                    </form>
</div>
            </li>
        </ul>
        <form class="d-flex">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">&#128269;</button>
        </form>
    </div>
</nav>
@isset($rows)
    <div>
        Импортировано {{$rows}} категорий.
    </div>
@endisset
<div>
    @isset($categories)
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Номер ргруппы</th>
            <th scope="col">Имя ргруппы</th>
            <th scope="col">Имя ргруппы укр.</th>
            <th scope="col">ID ргруппы</th>
            <th scope="col">Номер родителя ргруппы</th>
            <th scope="col">ID родителя ргруппы</th>
            <th scope="col">HTML заголовок</th>
            <th scope="col">HTML заголовок укр.</th>
            <th scope="col">HTML описание</th>
            <th scope="col">HTML описание укр.</th>
            <th scope="col">HTML слова</th>
            <th scope="col">HTML слова укр.</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
            <th scope="row">{{ $category->group_number }}</th>
            <td>{{ $category->group_name }}</td>
            <td>{{ $category->group_name_ukr }}</td>
            <td>{{ $category->group_id }}</td>
            <td>{{ $category->group_parent_number }}</td>
            <td>{{ $category->group_parent_id }}</td>
            <td>{{ $category->group_html_title }}</td>
            <td>{{ $category->group_html_title_ukr }}</td>
            <td>{{ $category->group_html_description }}</td>
            <td>{{ $category->group_html_description_ukr }}</td>
            <td>{{ $category->group_html_keywords }}</td>
            <td>{{ $category->group_html_keywords_ukr }}</td>
            </tr>
        @endforeach
            </tbody>
        </table>
    @endisset

    @isset($categories_tree)
        <ul>
        @foreach($categories_tree as $node)
            @include('category.node', ['node' => $node])
        @endforeach
        </ul>
    @endisset
</div>
<script>
    const drop = document.querySelector('#navbarDropdown');
    const iForm = document.querySelector('#importForm');
    drop.addEventListener('click', (event)=> {
        event.preventDefault();
        iForm.classList.toggle('show');
    });
</script>

@endsection