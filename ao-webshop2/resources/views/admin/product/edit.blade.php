@extends('layouts.app')


@section('content')
<div class="row">
        <div class="col-12" id='title'>
                <h1>Edit the product {{$product->name}}</h1>
        </div>
        <div class="col-12 form-group">
                <form action="{{ route('product.update', $product->id )}}" class="form" method="post" id="product-form">
                        @method('PUT')
                        @csrf

                        <label for="name">Product name</label>
                        <input @if (!empty( $product->name )) value="{{$product->name}}"@endif
                         name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control" placeholder="product name">
                        @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        
                        <label for="description">Product description</label>
                        <textarea name="description" id="description" type="text" class="@error('description') is-invalid @enderror form-control" form="product-form" placeholder="product description">@if(!empty( $product->description )){{$product->description}}@endif</textarea>
                        @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="price">Product price</label>
                        <input @if (!empty( $product->price )) value="{{$product->price}}"@endif
                         class="form-control" type="number" step="0.01" id="price" name="price" min="0.00" max="99999.99" placeholder="product price">
                        @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="category">Select category</label>
                        <select class="form-control" id="category" name="category">
                                <option value="">select a category</option>
                                @foreach ($categories as $item)
                                        <option @if ($product->category == $item->id) selected @endif value="{{ $item->id }}">{{$item->name}}</option>
                                @endforeach
                        </select>
                        @error('category')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="submit" value="Submit" class="btn btn-primary" >
                </form>
        </div>
</div>
@endsection