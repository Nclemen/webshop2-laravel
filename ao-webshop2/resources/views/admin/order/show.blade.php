@extends('layouts.app')


@section('content')
                <div class="row">
                        @if (Auth::user()->is_admin)
                        @include('inc.dashboard-sidebar')
                        @endif
                        <div class=" @if (Auth::user()->is_admin) col-9 @else col-12 @endif">
                                <h1>this is the show page for the order {{ $order->id }}</h1>
                                <div class="container text-left">
                                        @foreach ($cart->items as $item)
                                                <div class="card">
                                                        <div class="card-body">
                                                                <div class="container">
                                                                        <div class="row">
                                                                                <div class="col-12">
                                                                                <h1>{{$item['item']->name}}</h1>
                                                                                <h2>combined price: {{$item['combinedPrice']}}</h2>
                                                                                <h3>price a piece: {{$item['price']}}</h3>
                                                                                <h4>amount ordered: {{$item['amount']}}</h4>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        @endforeach
                                </div>
                                <div class="container">
                                        <div class="row">
                                                <h1 class="col-9">
                                                        order price:  {{$cart->totalPrice}}
                                                </h1>
                                        </div>
                                </div>
                        </div>
                </div>
@endsection