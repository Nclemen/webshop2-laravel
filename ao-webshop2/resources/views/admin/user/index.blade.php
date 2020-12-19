@extends('layouts.app')


@section('content')
                <div class="row">
                        @include('inc.dashboard-sidebar')
                        <div class="col-9">
                                <h1>this is the users index page</h1>
                                    <x-table :headers='$headers' :content="$users" modelName="user"/>
                        </div>
                </div>
@endsection