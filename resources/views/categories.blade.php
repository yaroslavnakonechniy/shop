@extends('layouts.app')

@section('content')


@foreach($categories as $category)
    <div>
        <a href="{{route('category', $category->code)}}">
            {{$category->name}}
        </a>
        <h3>{{$category->code}}</h3>
        <h3>{{$category->description}}</h3>
    </div>

@endforeach


@endsection