@extends('layouts.app')

@section('content')

<div class="starter-template">
        <h1>Корзина</h1>
        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{session()->get('warning')}}</p>
        @endif
        <p>Оформление заказа</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                        <a href="{{route('show_product',[$product->category->code, $product->id] )}}" class="btn btn-default" role="button">
                            <img height="56px" src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg">
                            {{$product->name }}
                        </a>

                        </td>
                        <td><span class="">{{$product->pivot->count}}</span>
                            <div class="btn-group">
                                <form action="{{route('removeBasket', $product)}}" method="POST">
                                    <button type="submit" class="btn btn-danger">
                                       
                                       <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span></button>
                                    @csrf
                                </form>
                                <form action="{{route('addBasket', $product)}}" method="POST">
                                    <button type="submit" class="btn btn-success">
                                       
                                       <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span></button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{$product->price }}  грн.</td>
                        <td>{{$product->getPriceForCount() }} грн.</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td>{{$order->getFullPrice() }} грн.</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="{{route('basket-order')}}">Оформить заказ</a>
            </div>
        </div>
    </div>

@endsection