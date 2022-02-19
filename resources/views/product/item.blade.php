@extends('layout')

@section('content')
@include('product.navbar')
<div class="product-full">
    @isset($error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endisset
    @isset($info)
        <div class="alert alert-success" role="alert">
            {{ $info }}
        </div>
    @endisset
    <a href="{{ url()->previous() }}">&#129044;Назад </a>
    <img src="{{url('storage/thumbs/' . $item->thumbnail->name)}}" />
    <form method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}" />
        <div class="row mb-1">
            <div class="col-2">
                <label for="vendor_code">Артикул:</label>
                <input class="form-control" type="text" name="vendor_code" value="{{ $item->vendor_code }}" />
            </div>
            <div class="col-2">
                <label for="label">Ярлык:</label>
                <input class="form-control" type="text" name="label" value="{{ $item->label }}" />
            </div>
            <div class="col-2">
                <label for="personal_marks">Заметка:</label>
                <input class="form-control" type="text" name="personal_marks" value="{{ $item->personal_marks }}" />
            </div>
            <div class="col-2">
                <label for="price">Цена:</label>
                <input class="form-control" type="text" name="price" value="{{ $item->price }}" />
            </div>
            <div class="col-2">
                <label for="discount">Скидка %:</label>
                <input class="form-control" type="text" name="discount" value="{{ $item->discount }}" />
            </div>
            <div class="col-2">
                <label for="type">Тип:</label>
                <input class="form-control" type="text" name="type" value="{{ $item->type }}" />
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="name">Название:</label>
            </div>
            <div class="col-9">
              <input class="form-control" type="text" name="name" value="{{ $item->name }}" />
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="name_ukr">Название укр:</label>
            </div>
            <div class="col-9">
              <input class="form-control" type="text" name="name_ukr" value="{{ $item->name_ukr }}" />
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="description">Описание:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="description">{{ $item->description }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="description_ukr">Описание укр:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="description_ukr">{{ $item->description_ukr }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="keywords">Поисковые запросы:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="keywords">{{ $item->keywords }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="keywords_ukr">Поисковые запросы укр:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="keywords_ukr">{{ $item->keywords_ukr }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="html_title">HTML Название:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="html_title">{{ $item->html_title }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="html_title_ukr">HTML Название укр:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="html_title_ukr">{{ $item->html_title_ukr }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="html_description">HTML Описание:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="html_description">{{ $item->html_description }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="html_description_ukr">HTML Описание укр:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="html_description_ukr">{{ $item->html_description_ukr }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="html_keywords">HTML Запросы:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="html_keywords">{{ $item->html_keywords }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="html_keywords_ukr">HTML Запросы укр:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="html_keywords_ukr">{{ $item->html_keywords_ukr }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="manufacturer">Производитель:</label>
            </div>
            <div class="col-9">
              <input class="form-control" rows="3" name="manufacturer" value="{{ $item->manufacturer }}" />
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="country">Страна:</label>
            </div>
            <div class="col-9">
              <input class="form-control" rows="3" name="country" value="{{ $item->country }}" />
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="gifts">Подарки:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="gifts">{{ $item->gifts }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="gifts_id">Подарки ID:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="gifts_id">{{ $item->gifts_id }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="accompany">Сопутствующие:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="accompany">{{ $item->accompany }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="accompany_id">Сопутствующие ID:</label>
            </div>
            <div class="col-9">
              <textarea class="form-control" rows="3" name="accompany_id">{{ $item->accompany_id }}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="weight">Вес:</label>
            </div>
            <div class="col-9">
              <input class="form-control" rows="3" name="weight" value="{{ $item->weight }}" />
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="width">Ширина:</label>
            </div>
            <div class="col-9">
              <input class="form-control" rows="3" name="width" value="{{ $item->width }}" />
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="height">Высота:</label>
            </div>
            <div class="col-9">
              <input class="form-control" rows="3" name="height" value="{{ $item->height }}" />
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-3">
                <label for="length">Длина:</label>
            </div>
            <div class="col-9">
              <input class="form-control" rows="3" name="length" value="{{ $item->length }}" />
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Сохранить" />
    </form>
</div>
@endsection