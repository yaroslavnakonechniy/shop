@extends('layouts.app')

@section('content')
    <h1>
        {{$category->name}} {{ $category->products->count() }}       
    </h1>
        @foreach($category->products as $product)
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
                        <div class="caption">
                            id:<h3>{{$product->id}}</h3>
                            <h2>{{$product->category->code}}</h2>
                            <h3>{{$product->name}}</h3>
                            <h3>{{$product->description}}</h3>
                            <p>{{$product->price}}</p>
                            <form action="{{route('addBasket', $product)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary"> В корзину</button>
                            </form>
                            <a href="{{route('show_product',[$product->category->code, $product->id] )}}" class="btn btn-default" role="button">Подробнее</a>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


@endsection