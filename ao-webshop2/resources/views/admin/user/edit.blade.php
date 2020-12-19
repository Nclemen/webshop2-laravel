@extends('layouts.app')


@section('content')
<div class="row">
        <div class="col-12" id='title'>
                <h1>Edit the user {{$user->name}}</h1>
        </div>
        <div class="col-12 form-group">
                <form action="{{ route('user.update', $user->id )}}" class="form" method="post">
                        @method('PUT')
                        @csrf
                        
                        <label for="name">user name</label>
                        <input value="{{$user->name}}" name="name" id="name" type="text" class="@error('name') is-invalid @enderror form-control" placeholder="user name">
                        @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="custom-control custom-radio">
                                <input @if (!$user->is_admin) checked @endif type="radio" id="customRadio2" name="is_admin" class="custom-control-input" value="0">
                                <label class="custom-control-label" for="customRadio2">This user is NOT an admin</label>
                        </div>
                        <div class="custom-control custom-radio">
                                <input @if ($user->is_admin) checked @endif type="radio" id="customRadio1" name="is_admin" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="customRadio1">This user IS an admin</label>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary" >
                </form>
        </div>
</div>
@endsection