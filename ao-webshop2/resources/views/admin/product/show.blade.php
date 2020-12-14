@extends('layouts.app')


@section('content')
                <div class="row">
                        <div class="col-12">
                                <h1>this is the show page for {{$product->name}}</h1>
                        </div>
                        <div>
                                <div class="col-12">
                                        <h1>{{$product->name}}</h1>
                                        <p>{{$product->description}}</p>
                                </div>
                        </div>
                </div>
@endsection