@extends('auth.layouts.master')

@section('title', 'додати Продукти')

@section('content')

<form method="post" enctype="multipart/form-data"

    @isset($product)
        action="{{route('products.update', $product)}}" 
        @else 
            action="{{route('products.store')}}"
    @endisset>
    @csrf
    @isset($product)
        @method('PUT')
    @endisset


  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="@isset($product){{ $product->name }}@endisset"  placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="description">description</label>
    <input type="text" class="form-control" id="description" name="description" value="@isset($product){{$product->description}} @endisset"  placeholder="Enter description">
  </div>
  <div class="form-group">
    <label for="price">price</label>
    <input type="text" class="form-control" id="price" name="price" value="@isset($product){{$product->price}} @endisset"  placeholder="Enter description">
  </div>
  <br>
    <div class="input-group row">
      <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
        <div class="col-sm-6">
          <select name="category_id" id="category_id" class="form-control">
            @foreach($categories as $category)
              <option value="{{ $category->id }}"
                @isset($product)
                  @if($product->category_id == $category->id)
                      selected
                  @endif
                @endisset
              >{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
    </div>
  <br>
  <div class="form-group">
    <label for="img">Img</label>
    <input type="file" class="form-control" id="img" name="img" value="@isset($product){{$product->image}} @endisset" placeholder="Choose file">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>





@endsection