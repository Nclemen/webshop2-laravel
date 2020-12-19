@extends('layouts.app')


@section('content')
<div class="row">
        <div class="col-12" id='title'>
                <h1>Edit the category {{$category->name}}</h1>
        </div>
        <div class="col-12 form-group">
                <form action="{{ route('category.update', $category->id )}}" class="form" method="post">
                        @method('PUT')
                        @csrf
                        
                        <label for="name">Category name</label>
                        <input value="{{$category->name}}" name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control" placeholder="categorie name">
                        @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="submit" value="Submit" class="btn btn-primary" >
                </form>
        </div>
</div>
@endsection