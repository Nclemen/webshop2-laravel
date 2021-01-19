@extends('layouts.app')


@section('content')
                <div class="row">
                        @include('inc.dashboard-sidebar')
                        <div class="col-9">
                                <h1>this is the orders index page</h1>
                                    <x-table :headers='$headers' :content="$orders" modelName="orders" options="false"/>
                        </div>
                </div>
@endsection