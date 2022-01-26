@extends('layout')

@section('content')

<h4>Импрот:</h4>
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <label for="filename">Выбор файла:</label>
        <input class="form-control" type="file" name="filename">
    </div>
    <input class="btn btn-primary" type="submit" value="Загрузить">
</form>

@endsection