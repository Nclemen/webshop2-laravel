@extends('layouts.app')


@section('content')
                <div class="row">
                        <div class="col-12">
                                <h1>profile</h1>
                        </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1>orders</h1>
                        <x-table :headers='$headers' :content="$orders" modelName="order" options="false"/>
                    </div>
                </div>
@endsection