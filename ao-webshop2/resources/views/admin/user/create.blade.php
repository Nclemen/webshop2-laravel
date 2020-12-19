@extends('layouts.app')


@section('content')
                <div class="row">
                        <div class="col-12">
                                <h1>Create New Category</h1>
                        </div>
                        <div class="col-12 form-group">
                                <form action="{{ route('category.store') }}" class="form"  method="POST"  >
                                        @csrf

                                        <label for="name">Category name</label>
                                        <input name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control" placeholder="categorie name">
                                        @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                
                                        <input type="submit" value="Submit" class="btn btn-primary" >
                                </form>
                        </div>
                </div>
@endsection