@extends('auth.layouts.master')

@section('title', 'додати Категории')

@section('content')

<form method="post" enctype="multipart/form-data"

    @isset($category)
        action="{{route('categories.update', $category)}}" 
        @else 
            action="{{route('categories.store')}}"
    @endisset>
    @csrf
    @isset($category)
        @method('PUT')
    @endisset


  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="@isset($category){{ $category->code }}@endisset"  placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="code">code</label>
    <input type="text" class="form-control" id="code" name="code" value="@isset($category){{$category->code}} @endisset"  placeholder="Enter code">
  </div>
  <div class="form-group">
    <label for="description">description</label>
    <input type="text" class="form-control" id="description" name="description" value="@isset($category){{$category->description}} @endisset"  placeholder="Enter description">
  </div>
  <div class="form-group">
    <label for="img">Img</label>
    <input type="file" class="form-control" id="img" name="img" value="@isset($category){{$category->image}} @endisset" placeholder="Choose file">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>





@endsection