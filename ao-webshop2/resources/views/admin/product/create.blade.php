@extends('layouts.app')


@section('content')
                <div class="row">
                        <div class="col-12">
                                <h1>Create New Product</h1>
                        </div>
                        <div class="col-12 form-group">
                                <form action="{{ route('product.store') }}" class="form"  method="POST"  >
                                        @csrf

                                        <label for="name">Product name</label>
                                        <input name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control" placeholder="product name">
                                        @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        
                                        <label for="description">Product description</label>
                                        <textarea name="description" id="description" type="text" class="@error('description') is-invalid @enderror form-control" placeholder="product description"></textarea>
                                        @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="price">Product price</label>
                                        <input class="form-control" type="number" step="0.01" id="price" name="price" min="0.00" max="99999.99" placeholder="product price">
                                        @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="category">Select category</label>
                                        <select class="form-control" id="category" name="category">
                                                <option>select a category</option>
                                                @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}">{{$item->name}}</option>
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