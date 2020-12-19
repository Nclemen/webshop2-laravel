@extends('layouts.app')


@section('content')
                <div class="row">
                        <div class="col-12">
                                <h1>cart</h1>
                                    <div class="container text-left">
                                        @if (Session::get('cart'))
                                        @foreach ($cart->items as $item)
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <h1>{{$item['item']->name}}</h1>
                                                            <p>{{$item['combinedPrice']}}</p>
                                                        </div>
                                                        <div class="col-3">
                                                            <form action="{{route('shop.updateCart', $item['item']->id)}}" class="form" method="post">
                                                                @method('put')
                                                                @csrf
    
                                                                <label for="amount">amount:</label>
                                                                <input type="number" name="amount" id="amount" value="{{ $item['amount'] }}" min="0" max="99">
                                        
                                                                <input type="submit" value="Update" class="btn btn-info" >
                                                            </form>
                                                            <form action="{{route( 'shop.deleteFromCart', $item['item']->id)}}" class="form" method="post">
                                                                @method('delete')
                                                                @csrf
                                        
                                                                <input type="submit" value="Delete" class="btn btn-danger" >
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        @endforeach
                                        @endif

                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <h1 class="col-9">
                                                total price: @if (Session::get('cart')) {{$cart->totalPrice}} @endif
                                            </h1>
                                            <div class="col-3">
                                                <form action="{{route('placeOrder')}}" class="form" method="post">
                                                    @csrf

                            
                                                    <input type="submit" value="Order" class="btn btn-primary" >
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                </div>
@endsection