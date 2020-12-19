@extends('layouts.app')


@section('content')
                <div class="row">
                        @if (Auth::user()->is_admin)
                        @include('inc.dashboard-sidebar')
                        @endif
                        <div class=" @if (Auth::user()->is_admin) col-9 @else col-12 @endif">
                                <h1>this is the show page for the order {{ $order->id }}</h1>
                        </div>
                </div>
@endsection