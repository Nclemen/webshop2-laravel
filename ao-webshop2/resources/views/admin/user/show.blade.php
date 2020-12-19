@extends('layouts.app')


@section('content')
                <div class="row">
                        @include('inc.dashboard-sidebar')
                        <div class="col-9">
                                <h1>this is the show page for {{$user->is_admin}}</h1>
                        </div>
                </div>
@endsection