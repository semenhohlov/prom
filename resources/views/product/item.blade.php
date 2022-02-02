@extends('layout')

@section('content')
@include('product.navbar')
{{$item->specifications}}
@endsection