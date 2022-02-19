@extends('layout')

@section('content')
@include('product.navbar')

@isset($result)
    @if($search)
    <div class="alert alert-info mt-3">
        По запросу <em>"{{ $search }}"</em> найдено {{ count($resultFull) }} позиций.<br>
        Частичное совпадение {{ $result->total() }} позиций.
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Наличие</th>
            <th scope="col">Фото</th>
            </tr>
        </thead>
        <tbody>
            @isset($resultFull)
                @foreach($resultFull as $item)
                    <tr>
                    <th scope="row">
                        <a href="{{ url()->current() }}/{{ $item->id }}">{{ $item->name }}</a><br>
                        арт: {{ $item->vendor_code }}
                    </th>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->availability }}</td>
                    <td><img src="{{url('storage/thumbs/' . $item->thumbnail->name)}}" /></td>
                    </tr>
                @endforeach
            @endisset
            @foreach($result as $item)
                <tr>
                    <th scope="row">
                        <a href="{{ url()->current() }}/{{ $item->id }}">{{ $item->name }}</a><br>
                        арт: {{ $item->vendor_code }}
                    </th>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->availability }}</td>
                    <td><img src="{{url('storage/thumbs/' . $item->thumbnail->name)}}" /></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        {{ $result->links() }} <x-paginator 
            :perPage="$perPage"
            :search="$search ?? ''"/>
    </div>
@endisset

@endsection