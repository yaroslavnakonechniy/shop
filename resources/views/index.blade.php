@extends('layouts.app')

@section('content')
<div class="container">
    <div class="starter-template">
        <h1>Все товары</h1>
        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{session()->get('warning')}}</p>
        @endif


        @foreach($products as $product)
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
                        <div class="caption">
                            <h3>{{$product->name}}</h3>
                            <h3>{{$product->description}}</h3>
                            <p>{{$product->price}}</p>
                            <form action="{{route('addBasket', $product)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary"> В корзину</button>
                            </form>

                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach                  
    </div>
</div>


@endsection