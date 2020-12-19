@extends('layouts.app')


@section('content')
                <div class="row">
                        @include('inc.dashboard-sidebar')
                        <div class="col-9">
                                <h1>this is the categories index page</h1>
                                    <x-table :headers='$headers' :content="$categories" modelName="category"/>
                        </div>
                </div>
@endsection