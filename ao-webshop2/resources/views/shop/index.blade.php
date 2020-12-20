@extends('layouts.app')


@section('content')
                <div class="row">
                        @include('inc.shop-sidebar')
                        <div class="col-9">
                                <h1>shop</h1>
                                    <div class="container text-left">
                                        @foreach ($products as $item)
                                        <div class="card mb-12" >
                                            <div class="row g-0">
                                              <div class="col-md-4">
                                                <img src="..." alt="...">
                                              </div>
                                              <div class="col-md-8">
                                                <div class="card-body">
                                                  <h5 class="card-title"><a href="{{route('shop.product', $item->id)}}">{{ $item->name }}</a></h5>
                                                  <p class="card-text">{{ $item->description }}</p>
                                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{str_replace( " " , "" ,$item->name . $item->id)}}">add to cart</button>
                                                  <x-modal :item="$item"/>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                        </div>
                </div>
@endsection