@extends('layout')

@section('content')
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-9">
            <input class="form-control" type="file" name="filename">
        </div>
        <div class="col-3">
            <input class="btn btn-primary" type="submit" value="Загрузить">
        </div>
    </div>
</form>

@isset($loaded)
<div class="row mb-1">
    <div class="col-6 mb-1">
        <div class="d-flex justify-content-between">
        <h6>Группы прома</h6>
        <form><input type="text" name="search" id="searchId" placeholder="Поиск"></form>
        </div>
        <ul class="overflow-auto" id="prom_groups" style="max-height: 300px;"></ul>
    </div>
    <div class="col-6 mb-1">
        <h6>Группы из файла</h6>
        <ul class="overflow-auto" id="loaded_groups" style="max-height: 300px;"></ul>
    </div>
</div>
<script>
    const loaded = {{ Illuminate\Support\Js::from($loaded) }};
    const cats = {{ Illuminate\Support\Js::from($cats) }};
</script>
<script src="{{ asset('js/compare.js') }}"></script>
@endisset

@endsection