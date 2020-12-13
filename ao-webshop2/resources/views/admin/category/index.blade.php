@extends('layouts.app')


@section('content')
                <div class="row">
                        <div class="col-12">
                                <h1>this is the categories index page</h1>
                                    <x-table :content="$categories" modelName="category"/>
                        </div>
                </div>
@endsection