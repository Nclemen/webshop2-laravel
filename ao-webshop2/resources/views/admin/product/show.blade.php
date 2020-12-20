@extends('layouts.app')


@section('content')
                <div class="row">
                        @if (Auth::check() && Auth::user()->is_admin)
                        @include('inc.dashboard-sidebar')
                        @endif
                        <div class="@if (Auth::check() && Auth::user()->is_admin) col-9 @else col-12 @endif">
                                <h1>this is the show page for {{$product->name}}</h1>
                                <div class="container text-left">
                                                <div class="card">
                                                        <div class="card-body">
                                                                <div class="container">
                                                                        <div class="row">
                                                                                <div class="col-12">
                                                                                <h1>{{$product->name}}</h1>
                                                                                <h4>Description</h4>
                                                                                <p>{{$product->description}}</p>
                                                                                <h4>Category</h4>
                                                                                <p>{{$product->category->name}}</p>
                                                                                <h4>Price</h4>
                                                                                <p>{{$product->price}}</p>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                </div>
                                <div class="container">
                                        <div class="row">
                                                <h1 class="col-12">
                                                        <div class="card mb-12" >
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{str_replace( " " , "" ,$product->name . $product->id)}}">add to cart</button>
                                                                <x-modal :item="$product"/>
                                                        </div>
                                                </h1>
                                        </div>
                                </div>
                        </div>
                </div>
@endsection