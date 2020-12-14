@extends('layouts.app')


@section('content')
                <div class="row">
                        <div class="col-12">
                                <h1>this is the products index page</h1>
                                    <x-table :headers='$headers' :content="$products" modelName="product"/>
                        </div>
                </div>
@endsection