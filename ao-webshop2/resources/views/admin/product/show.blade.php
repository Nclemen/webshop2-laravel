@extends('layouts.app')


@section('content')
                <div class="row">
                        @include('inc.dashboard-sidebar')
                        <div class="col-9">
                                <h1>this is the show page for {{$product->name}}</h1>
                                <div >
                                        <p><u>product name: </u>{{$product->name}}</p>
                                        <p><u>product description: </u>{{$product->description}}</p>
                                        <p><u>product price: </u>{{$product->price}}</p>
                                        <p><u>product category: </u> @if (!empty($product->category)) {{$product->category->name}} @endif </p>

                                </div>
                        </div>
                </div>
@endsection